
let prevwiwContainer=document.querySelector('.product-preview');
let previewBox=prevwiwContainer.querySelectorAll('.preview');


document.querySelectorAll('.products-container .products').forEach(products=>{
    products.onclick=()=>{
        prevwiwContainer.style.display='flex';
        let name=products.getAttribute('data-name');
        previewBox.forEach(preview=>{
           let target= preview.getAttribute('data-target');
           if(name==target){
             preview.classList.add('active');
           }
        });
    };
});

previewBox.forEach(close => {
   close.querySelector('.closebtn').onclick = () => {
       close.classList.remove('active');
       prevwiwContainer.style.display = 'none';
   };
});

function redirectToPage() {
    var selectElement = document.getElementById("sort");
    var selectedValue = selectElement.value;
    

    window.location.href = selectedValue;
  }

