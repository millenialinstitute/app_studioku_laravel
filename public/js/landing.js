const btnCollect = document.getElementById('btnCollect');
const modalCollect = document.getElementById('modalCollect');
const collections = modalCollect.querySelectorAll('ul li');
const inputCollect = modalCollect.querySelector('form input[name="collections"]')
const btnClose = modalCollect.querySelector('button[type="button"]');

btnCollect.addEventListener('click' , function() {
	modalCollect.classList.add('active');
})

btnClose.addEventListener('click' , ()=> {
	modalCollect.classList.remove('active');
})

const listCollect = [];
collections.forEach(collection => {
	collection.addEventListener('click' , () => {
		collection.classList.toggle('active');
		let collectId = parseInt(collection.getAttribute('data-id'));
		let status = listCollect.includes(collectId);
		if(!status) {
			listCollect.push(collectId);
		} else {
			let indexCollect = listCollect.indexOf(collectId);
			listCollect.splice(indexCollect , 1);
		}
		inputCollect.value = JSON.stringify(listCollect);
	})
})
