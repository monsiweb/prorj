<?php /* Template Name: Imóveis */ ?>

<?php get_header(); ?>

<section class="terms">
    <div class="container">
        <div class="terms__title">
            <h2 class="title--primary">Aceito os termos e condições</h2>
        </div>

        <div class="terms_content">
            <p class="text--primary">Seja bem vindo! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor elit sit amet interdum dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor elit sit amet interdum dapibus. </p>
            <form action="">
                <div class="checkbox__input">
                    <div class="pretty p-default p-thick p-smooth">
                        <input type="checkbox" />
                        <div class="state p-warning-o">
                            <label>Aceito os <a href="#" class="link--primary">termos de uso</a></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn--third float-right">AVANÇAR</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>