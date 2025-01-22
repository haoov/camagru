export class CLogin extends HTMLElement {
	connectedCallback() {
		this.innerHTML =
`
<h2>Login view</h2>
`;
	}
};

customElements.define("c-login", CLogin);
