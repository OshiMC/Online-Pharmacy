
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

//anith ek
function navigateToPage(selectElement) {
            var selectedPage = selectElement.value;
            localStorage.setItem('previousPage', window.location.href);
            window.location.href = selectedPage;
        }

        function goBack() {
            var previousPage = localStorage.getItem('previousPage');
            if (previousPage) {
                localStorage.removeItem('previousPage');
                window.location.href = previousPage;
            }
        };
