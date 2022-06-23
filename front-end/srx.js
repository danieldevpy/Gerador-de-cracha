var nome = document.getElementsByName("nome")[0];
var cargo = document.getElementsByName("cargo")[0];
var matricula = document.getElementsByName("matricula")[0];


this.addEventListener("keypress", (e) => {

    let code = e.charCode;
	
	if (e.target.name == "nome") {		

		if (code < 65 || code > 122) {
			//IGNORE SPACE							

			if (e.key != " ") {				
				e.preventDefault();
			}
		} else {
			//STOP EVENT AND TO UPPER CASE
			e.preventDefault();
			nome.value += e.key.toUpperCase(); 
		}

	} else if (e.target.name == "cargo") {

		e.key.toUpperCase();

		if (code < 65 || code > 122) {
			//IGNORE SPACE
			if (e.key != " ") {
				console.log(code)
				e.preventDefault();
			}
		} else {
			e.preventDefault();
			cargo.value += e.key.toUpperCase();
		}

	} else if (e.target.name == "matricula") {

		if (code < 48 || code > 57) {
			//IGNORE SPACE
			if (e.key != " ") {
				console.log(code)
				e.preventDefault();
			}
		}

	} else if (e.target.name == "cpf") {
		if (code < 48 || code > 57) {
			//IGNORE SPACE
			if (e.key != " ") {
				console.log(code)
				e.preventDefault();
			}
		}
	} else if (e.target.name == "rg") {

		if (code < 48 || code > 57) {
			//IGNORE SPACE
			if (e.key != " ") {
				console.log(code)
				e.preventDefault();
			}
		}

    }

});

