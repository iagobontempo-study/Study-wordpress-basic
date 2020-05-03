CONTATO CUSTOM PAGE

<?php get_header() ?>


<div class="container">
    <form id="formulario-contato">

        <input type="text" name="form.nome">
        <input type="text" name="form.telefone">
        <input type="email" name="form.email">

        <div onclick="sendForm(event)">
            Enviar
        </div>
    </form>
</div>


<?php get_footer(); ?>