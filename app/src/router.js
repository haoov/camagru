import { CGallery } from "./views/gallery.js";
import { CSignin } from "./views/signin.js";
import { CLogin } from "./views/login.js";

class Router {
	routes = [
		{
			name: "gallery",
			path: "/gallery",
			component: CGallery
		},
		{
			name: "signin",
			path: "/signin",
			component: CSignin
		},
		{
			name: "login",
			path: "/login",
			component: CLogin
		}
	];

	navTo(name) {
		const route = this.routes.find(r => r.name === name);
		const main = document.querySelector("main");
		const componentName = customElements.getName(route.component);
		const element = document.createElement(componentName);

		main.replaceChildren(element);
	}

	routerView() {
		const path = window.location.pathname;
		const route = this.routes.find(r => r.path === path);

		if (route !== undefined) {
			this.navTo(route.name);
		}
	}
}

export const router = new Router();
