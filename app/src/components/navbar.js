export class CNavbar extends HTMLElement {
	connectedCallback() {
		this.innerHTML =
`
<ul id="navlist">
	<li>
		<a href="/gallery">Gallery</a>
	</li>
</ul>
`;
	}
};

customElements.define("c-navbar", CNavbar);
