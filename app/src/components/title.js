export class CTitle extends HTMLElement {
	connectedCallback() {
		this.innerHTML = `
<h1 id="mainTitle">Camagru</h1>
`;
	}
};

customElements.define("c-title", CTitle);
