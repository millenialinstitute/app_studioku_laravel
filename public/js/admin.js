const btnReject = document.querySelector('.btn-reject');
const modalReject = document.querySelector('.modal#modalReject');

if(btnReject) {
	btnReject.addEventListener('click' , () => {
		modalReject.classList.toggle('active')
	})
}