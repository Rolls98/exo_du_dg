(function () {


    var btn = document.querySelector("#btn"),
        body = document.body;

    btn.addEventListener("click", function () {
        body.appendChild(createModal());
    });


    function createModal() {
        var div = document.createElement("div"),
            div2 = div.cloneNode(true),
            h2 = document.createElement("h2"),
            form = document.createElement("form"),
            input = document.createElement("input"),
            input2 = document.createElement("textarea"),
            input3 = input.cloneNode(true),
            submit = input.cloneNode(true),
            label = document.createElement("label"),
            br = document.createElement("br"),
            label2 = label.cloneNode(true);

        h2.innerHTML = "Ajouter une video";
        label.innerHTML = "Titre";
        label2.innerHTML = "Description";
        input.setAttribute("type", "text");
        input.setAttribute("name", "titre");
        input2.setAttribute("name", "descript")
        submit.setAttribute("type", "submit");
        submit.setAttribute("value", "upload");

        input3.setAttribute("type", "file");
        input3.setAttribute("name", "fichier");
        input2.setAttribute("cols", "50");
        input2.setAttribute("rows", "10");

        form.setAttribute("action", "traitement.php");
        form.setAttribute("method", "post");
        form.setAttribute("enctype", "multipart/form-data");

        form.append(h2, br, label, br.cloneNode(true), input, br.cloneNode(true), label2, br.cloneNode(true), input2, br.cloneNode(true), input3, br.cloneNode(true), submit);

        div2.appendChild(form);
        div2.className = "form";

        div.appendChild(div2);
        div.style = "background-color:rgba(0,0,0,.45);position:absolute;top:0;bottom:0;left:0;right:0";
        return div;
    }

})();