const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
/* menu mobile */
{
    const menuToggle = $('#nav__mobile');
    const menuFull = $('.nav__list');
    menuToggle.onclick = function() {
        menuFull.classList.toggle('show');
    }

}
/* click product to view */
{
    const imgProducts = $$('.product__content')
    
    const buttonViewProduct = $('.jsView-detail')
    for (const imgProduct of imgProducts) {
        imgProduct.onmouseover = function(e) {            
            for (const item of this.children) {
                if (item.classList.contains('btn')) {
                    item.classList.add('show')
                }
            }
            
        }      
        imgProduct.onmouseout = function(e) {
            for (const item of this.children) {
                if (item.classList.contains('btn')) {
                    item.classList.remove('show')
                }
            } 
        }
    }
    // imgProduct.onmouseover = function() {
    //     buttonViewProduct.classList.add('show');        
    // }
    // imgProduct.onmouseout = function() {
    //     buttonViewProduct.classList.remove('show');        
    // }
}