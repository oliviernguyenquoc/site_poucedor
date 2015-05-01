<section style="width=100%;">
<!-- 2 cas possibles : Le récit de l'aventure est complèter ou ne l'est pas -->
<?php
if(empty($data1['comment'])) 
{
?>

    <p>
    	Ici, tu peux raconter ton histoire<br/>
    	Ci-dessous, nous avons mis à disposition un éditeur de texte.<br/>
    	Rédige ton texte, clique sur "Envoyer" et le tour est joué. Ta page apparait en lien dans le classement de ton édition du Pouce d'Or. <br/>
    </p>

<?php
    $placeholder="<html></html>";
?>

    <form method="post" action="page_perso_edition_form.php">
        <textarea class="champ" name="comment" style="width:100%" placeholder= <?php $placeholder; ?> ></textarea>
        <br/>
        <input class="submit" type="submit" value="Envoyer" />
    </form>

<!-- Affichage du récit si completer avec possibilité de l'éditer -->
<?php

}
else 
{
    $placeholder=$data1['comment'];
?>
    <div id="commentVisible">
        <h4>Le récit de ton aventure</h4> (<a href="javascript:editFonction('commentVisible','commentInvisible');">Editer</a>)
        <?php echo($data1['comment']); ?>
    </div>
    <div id="commentInvisible" style="display:none;">
        <p>
            Ici, tu peux raconter ton histoire<br/>
            Ci-dessous, nous avons mis à disposition un éditeur de texte.<br/>
            Rédige ton texte, clique sur "Envoyer" et le tour est joué. Ta page apparait en lien dans le classement de ton édition du Pouce d'Or. <br/>
        </p>
        <form method="post" action="page_perso_edition_form.php">
            <textarea class="champ" name="comment" style="width:100%" placeholder= <?php $placeholder; ?> ></textarea>
            <br/>
            <input class="submit" type="submit" value="Envoyer" />
        </form>
    </div>

<?php
    }
?>

<!-- Tinymce -->
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
        ]
});</script>

</section>