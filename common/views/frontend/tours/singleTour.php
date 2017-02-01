<?php
require_once 'header.php';
?>

 <main class="content1">
    <h1><?php echo $tour->getName(); ?></h1>
    <article class="article">
        <figure>
            <img class="img-responsive img-rounded" src="admin/uploads/<?php echo $tour->getImage(); ?>"
                 alt="neshto si"/>

        </figure>
        <p class="singleTourParagraph"><?php echo $tour->getDescription(); ?></p>
    </article>
    <article class="article">
        <h3>Ден първи</h3>
        <p>
            <?php echo $tourInfo->getDay1(); ?>
        </p>

    </article>

    <article class="article">
        <h3>Ден втори</h3>
        <p>
            <?php echo $tourInfo->getDay2(); ?>
        </p>

    </article>

    <article class="article">
        <h3>Ден трети</h3>
        <p>
            <?php echo $tourInfo->getDay3(); ?>
        </p>

    </article>

    <article class="article">
        <h3>Ден четвърти</h3>
        <p>
            <?php echo $tourInfo->getDay4(); ?>
        </p>

    </article>
    <article class="article">
        <h3>Цени</h3>

        <table id="table">

            <tr>
                <th>Дата</th>
                <th>База</th>
                <th>Studio лукс гледка море</th>
                <th>Studio лукс гледка парк</th>
                <th>1-bed апартамент лукс гледка море</th>
                <th>1-bed апартамент лукс гледка парк</th>
                <th>1-bed апартамент лукс гледка море/без балкон</th>
                <th>2-bеd апартамент лукс</th>
            </tr>


            <tr>
                <td>11.06.2016-15.07.2016</td>
                <td>OB</td>
                <td>76 €</td>
                <td>71 €</td>
                <td>86 €</td>
                <td>76 €</td>
                <td>81 €</td>
                <td>105 €</td>
            </tr>


            <tr>
                <td>16.07.2016-25.08.2016</td>
                <td>OB</td>
                <td>86 €</td>
                <td>81 €</td>
                <td>100 €</td>
                <td>86 €</td>
                <td>90 €</td>
                <td>119 €</td>
            </tr>


            <tr>
                <td>26.08.2016-30.09.2016</td>
                <td>OB</td>
                <td>57 €</td>
                <td>48 €</td>
                <td>76 €</td>
                <td>67 €</td>
                <td>71 €</td>
                <td>95 €</td>
            </tr>

        </table>


    </article>
    <article class="article">
        <h3>Допълнителна информация</h3>
        <p>
            <?php echo $tourInfo->getAdditionalInfo(); ?>
        </p>
    </article>
</main>

<aside id="reserveBtn" class="buttonReserve">
    <a href="../../../../contacts.php#here">RESERVE</a>

</aside>

<aside class="content">
    <h3>ЦЕНА OT: <?php echo $tourInfo->getPrice() ?> лв</h3>
    <h3>ЦЕНАТА ВКЛЮЧВА</h3>
    <p><?php echo $tourInfo->getPriceIncludes(); ?></p>
</aside>

<aside class="content">
    <h3>ЦЕНАТА HE ВКЛЮЧВА</h3>
    <p><?php echo $tourInfo->getPriceExcludes(); ?></p>
</aside>


<section class="gallery">
    <h2>Gallery</h2>


    <div id="gallery">
        <?php foreach ($images as $image) : ?>
            <figure>
                <a href="admin/uploads/tours/<?php echo $image->getImage(); ?>" data-lightbox="image-1">
                    <img src="admin/uploads/tours/<?php echo $image->getImage(); ?>" alt="img 1"/>
                </a>
            </figure>
        <?php endforeach; ?>
    </div>

</section>


<script src="../../../../js/lightbox.js"></script>


<!--==============================footer=================================-->
<?php require_once 'footer.php' ?>
