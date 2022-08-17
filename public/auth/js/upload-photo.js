const CLOUDINARY_API = "https://api.cloudinary.com/v1_1/dzsxaq1gf/image/upload";
const CLOUDINARY_PRESET = "fvq2d10h";
const file = document.getElementById('photo');
const preview = document.getElementById('photo_preview');
const photo_gallerys = document.getElementById('photo_gallery');
let html = '';
let arr = [];
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
file.addEventListener('change', function (e) {
  console.log(e.target.files);
  const files = e.target.files;
  for (let index = 0; index < files.length; index++) {
    let id = Math.floor(Math.random() * 10000000);
    document.getElementById('btnAddPhoto').style.display = 'none';
    upload(files[index]).then(data => {
      document.getElementById('btnAddPhoto').style.display = 'block';
      html += `
          <div class="col-4 mt-1" style="position: relative;">
          <i data-id="${id}" class="fa-solid fa-circle-xmark delete" style="position: absolute;top: 0;right: 0;transform: translateX(-75%);"></i>
          <img src="${data.url}" class="img-thumbnail" />
          </div>
          `;
      arr.push({
        id: id,
        src: data.url
      });
      render(arr);
      preview.innerHTML = html
      remove(); // Gán hàm cho các nút xóa
    }).catch(error => console.log(error));
  }

});

function render(data) {
  photo_gallerys.value = JSON.stringify(data);
}

function remove() {
  document.querySelectorAll('.delete').forEach(item => {
    item.addEventListener('click', function () {
      const { id } = item.dataset;
      html = '';
      arr = arr.filter(item => item.id != id);

      arr.forEach(item => {
        html += `
                    <div class="col-4 mt-1" style="position: relative;">
          <i data-id="${item.id}" class="fa-solid fa-circle-xmark delete" style="position: absolute;top: 0;right: 0;transform: translateX(-75%);"></i>
          <img src="${item.src}" class="img-thumbnail" />
          </div>
                    `;
      });
      preview.innerHTML = html;
      render(arr);
      remove() // Gọi lại chính nó để gán hàm xóa các tử được render vào biến html
    })
  })
}
if (photo_gallerys) {
  arr = JSON.parse(photo_gallerys.value);
  arr.forEach(item => {
    html += `
                <div class="col-4 mt-1" style="position: relative;">
      <i data-id="${item.id}" class="fa-solid fa-circle-xmark delete" style="position: absolute;top: 0;right: 0;transform: translateX(-75%);"></i>
      <img src="${item.src}" class="img-thumbnail" />
      </div>
                `;
  });
  preview.innerHTML = html;
  remove();
}

