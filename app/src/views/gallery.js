export class CGallery extends HTMLElement {
	connectedCallback() {
		this.innerHTML =
`
<section id="gallery">
</section>
`

		this.loadImages();
	}

	loadImages() {
		const gallery = document.getElementById("gallery");
		const images = [
			{
				file: "file",
				name: "name",
				author: "author",
				commentNumber: 0,
				likeNumber: 0
			}
		];

		images.forEach(i => {
			const article = document.createElement("article");
			const image = document.createElement("img");

			image.src = i.file;
			image.alt = i.name;
			article.appendChild(image);
			gallery.appendChild(article);
		})
	}
};

customElements.define("c-gallery", CGallery);
