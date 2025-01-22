export class CSignin extends HTMLElement {
	connectedCallback() {
		this.innerHTML =
`
<h2>Sign in view</h2>
`;
	}
};

customElements.define("c-signin", CSignin);
