
let account = document.querySelector('.user-account');

document.querySelector('#user-btn').onclick = () =>{
   account.classList.add('active');
}

document.querySelector('#close-account').onclick = () =>{
   account.classList.remove('active');
}

let myOrders = document.querySelector('.my-orders');

document.querySelector('#order-btn').onclick = () =>{
   myOrders.classList.add('active');
}

document.querySelector('#close-orders').onclick = () =>{
   myOrders.classList.remove('active');
}

let cart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
   cart.classList.add('active');
}

document.querySelector('#close-cart').onclick = () =>{
   cart.classList.remove('active');
}



	window.onload = fadeOut;

	document.querySelectorAll('input[type="number"]').forEach(numberInput => {
		numberInput.oninput = () => {
			if (numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
		};
	});
