document.addEventListener('DOMContentLoaded', () => {
    const qun = Array.prototype.slice.call(document.querySelectorAll('#quantity'));
    qun.forEach(item => {
        item.addEventListener('input',e => {

            if(parseInt(e.target.value) < 1) return alert('Value cannot be less then 0!');

            const fieldVal = parseInt(e.target.value);
            const fieldPrice = parseInt(e.target.dataset.price);
            const newVal = fieldPrice * fieldVal;

            const DOMParent = e.target.parentNode.parentNode.id;
            const dataGet = document.querySelector(`#${DOMParent}`);
            dataGet.querySelector('.cart_total').textContent =  numberWithCommas(newVal);
            dataGet.querySelector('.cart_total').dataset.price = newVal;
            updateGrandPrice();
        }); 
    });
});

function updateGrandPrice(){
    let row = Array.prototype.slice.call(document.querySelectorAll('.table-row'));
    let totalPrice = 0;
    row.forEach(item => {
        totalPrice += parseFloat(item.cells[4].dataset.price);
    })

    document.querySelector('#sub-total').textContent =  numberWithCommas(totalPrice);
    document.querySelector('#grand-total').textContent = numberWithCommas(totalPrice);

}


function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}