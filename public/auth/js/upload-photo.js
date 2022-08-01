const CLOUDINARY_API = "https://api.cloudinary.com/v1_1/trangptph18099/image/upload";
const CLOUDINARY_PRESET = "ufnnkotm";
const file = document.getElementById('img');
const preview = document.getElementById('previewMainImg');
const photo_gallerys = document.getElementById('photo_gallery');
let id = 1;
let photo_gallery = [];
let arr = [];

function add(data) {
    arr.push(data);
    photo_gallerys.value = JSON.stringify(arr);
  }
  const count = document.getElementById('count');
  function render(data, option = 1) {
    let html = '';
    let index = 0;
    data.forEach(item => {
      async function upload(file) {

        const formData = new FormData();
        formData.append("file", file);
        formData.append("upload_preset", CLOUDINARY_PRESET);
        const { data } = await axios.post(CLOUDINARY_API, formData, {
          headers: {
            "Content-Type": "application/form-data",
          },
        });

        return data;
      }
      if (option == 1) {
        upload(item.data).then(data => add({id:item.id,src:data.url})).catch(error => console.log(error));
     }
     const src = URL.createObjectURL(item.data);
     html += `
        <div class="col-4 mt-1" style="position: relative;">
        <i data-id="${item.id}" class="mdi mdi-close-circle delete" style="position: absolute;top: 0;right: 0;transform: translateX(-75%);"></i>
        <img src="${src}" class="img-thumbnail" />
        </div>`
     index++;
   });

   preview.innerHTML = html;
   document.querySelectorAll('.delete').forEach(item => {
     item.addEventListener('click', () => {
       const { id } = item.dataset;
       arr = arr.filter(item => item.id != id);
       photo_gallery = photo_gallery.filter(item => item.id != id);
       render(photo_gallery, 2);
       photo_gallerys.value = JSON.stringify(arr);

     })
   });
   count.innerHTML = `${index} ảnh đã được chọn`;
 }
 file.addEventListener('change', function (e) {
   const files = e.target.files;
   let html = '';
   let data = [];
   let i = 1;
   for (const iterator of files) {
     const date = new Date()
     data.push({
       id: Math.floor(Math.random() * 10000000000 + 1 + i),
       data: iterator
     });
     i += 1;
   }
   photo_gallery.push(...data);
   render(photo_gallery);
 });