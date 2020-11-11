@extends('layouts.admin')
@section('title'  , 'Buat Blog')
@section('blog' , 'active')
@section('body')

<form action="{{ url('admin/blog/store') }}" enctype="multipart/form-data" method="post">
	@csrf
<h3 class="title-section">Buat Blog</h3>
<div class="card-form row mb-5">
	<div class="col">
		<div class="form-group">
			<label for="title">Judul Blog</label>
			<input type="text" class="form-control" name="title">
		</div>
		<div class="form-group">
			<label for="cateogry">Kategori</label>
			<select name="category" id="category" class="form-control">
				<option value="all">All</option>
				<option value="contributor">Contributor</option>
				<option value="member">Member</option>
			</select>
		</div>
	</div>
	<div class="col">
		<div class="form-group mb-3">
			<label for="">Thumbnail</label>
			<input type="file" name="thumbnail" class="form-control">
		</div>
		<div class="text-right">
			<button type="button" class="btn button-send">Preview</button>
			<button type="submit" class="btn button-send">Publish</button>
		</div>
	</div>
</div>



<input type="hidden" value="" name="content" id="inputContentBlog">
<div class="content-blog">

</div>
<div class="navigasi mt-3 text-center">
	<button type="button" class="btn" id="btnParagraph" style="background: lightgreen;" >Paragraph</button>
	<button type="button" class="btn" id="btnHeading" style="background: skyblue">Heading</button>
</div>
</form>


@endsection


@section('script')
<script>
	const contentBlog = document.querySelector('.content-blog'),
		inputContentBlog = document.getElementById('inputContentBlog'),
			btnHeading = document.getElementById('btnHeading'),
			btnParagraph = document.getElementById('btnParagraph');

	let paragraphCount = 0;
	let headingCount = 0;
	function createParagraph() {
		let paragraph = document.createElement('div');
		let textarea = document.createElement('textarea');
		paragraph.classList.add('paragraph');
		paragraphCount++;
		textarea.setAttribute('placeholder' , 'Paragraph ' + paragraphCount);
		textarea.setAttribute('data-paragraph' , 'paragraph' + paragraphCount);
		paragraph.append(textarea);
		contentBlog.append(paragraph);
	}

	function createHeading() {
		let heading = document.createElement('div');
		let input = document.createElement('input');
		heading.classList.add('heading');
		headingCount++;
		input.setAttribute('placeholder' , 'Heading ' + headingCount);
		input.setAttribute('data-heading' , 'heading' + headingCount);
		heading.append(input);
		contentBlog.append(heading);
	}

	function updateValue() {
		const contentBlogData = document.createElement('div');
		contentBlogData.classList.add('content-blog');
		contentBlog.childNodes.forEach(element => {
			let check = element.tagName === 'DIV';
			if(check) {
				if(element.classList.value == 'paragraph') {
					let paragraphId = element.firstElementChild.getAttribute('data-paragraph');
					let checkElement = contentBlogData.querySelector('#' + paragraphId);
					if(!checkElement) {
						let paragraph = document.createElement('div');
						paragraph.classList.add('paragraph');
						paragraph.setAttribute('id' , paragraphId);
						paragraph.innerHTML = element.firstElementChild.value;
						contentBlogData.append(paragraph);
					}
				} else if(element.classList.value == 'heading') {
					let headingId = element.firstElementChild.getAttribute('data-heading');
					let checkElement = contentBlogData.querySelector('#' + headingId);
					if(!checkElement) {
						let heading = document.createElement('div');
						heading.classList.add('heading');
						heading.setAttribute('id' , headingId);
						heading.innerHTML = element.firstElementChild.value;
						contentBlogData.append(heading);
					}
				}
			}
		})

		inputContentBlog.value = outerHTML(contentBlogData);
		console.log(inputContentBlog.value);
	}

	function outerHTML(node) {
		return node.outerHTML || new XMLSerializer().serializeToString(node);
	}

	btnHeading.addEventListener('click' , function() {
		createHeading();
	})

	btnParagraph.addEventListener('click' , function() {
		createParagraph();
		updateValue();
	})

	contentBlog.addEventListener('change' , function(e) {
		updateValue();
	});

</script>	
@endsection
		