<?php
include 'logtimeout.php';
?>
<?=h_header('About Us')?>

<div class="recentlyadded content-wrapper">
    <h2>About Us</h2>
</div>
<div class="row">
    <div class="col">
      <video width="1366" height="650" autoplay muted loop>
        <source src="imgs/auvid.mp4" type="video/mp4">
      </video>
        <p class="abu">Green Stuff was founded in Selangor, Malaysia in 2022 by Lee Kah Hoong and  Long Chow Wai with the inspiration of the Sustainable Development Goals of the United Nations. Green Stuff’s mission is to reduce human-caused environmental impact for a more sustainable and greener future. While our vision is to contribute positive influence on the country and even the world starting by collecting recyclable materials to process and redesign, then selling them at a lower price that everyone could afford. We believe that the future of sustainability lies in circularity, therefore, our products are 100% made from renewable or recycled materials like single-use plastic bottles, ocean-bound marine plastic (OBP), etc by cooperating with the campus with a conscience, Sunway University that always emphasises the SDGs by having their creative students design all kinds of recycled products for us to produce and sell. At the same time, all profits earned will be used to cover the running costs of the company, while the extra profits will be channelled for charity purposes.
        <br><br>At Green Stuff, we sell all the recycled products on our e-commerce website and our physical pop-up shops which will be located at different locations around Malaysia. Feel free to visit our pop-up stores to learn more about recycling and the Sustainable Development Goals of the United Nations and also get our products made with love and green. You can even send us recyclable materials or resources by dropping by our store to get a 15% off voucher from us!
        </p>
</div>

<style>
  .row{
    display: block;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}

.row .col {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.row {
    margin-top: 50px;
}

.abu {
    padding: 0px 40px;
    font-size: larger;  
    margin-top: 50px;
    text-align: justify;
}
</style>

<br>
<br>
<br>
<?=h_footer()?>
