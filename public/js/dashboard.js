const btnCollapse = document.querySelectorAll('.btn-collapse');
btnCollapse.forEach(btn => {
	btn.addEventListener('click' , ()=> {
		let target = btn.getAttribute('data-target');
		const collapse = document.querySelector(target);
		let height = collapse.getAttribute('data-height');
		if(!collapse.classList.contains('active')) {
			collapse.style.height = height;
			collapse.classList.add('active');
		} else {
			collapse.style.height = '0';
			collapse.classList.remove('active');
		}
	})
})