
<body>
    <style>
.test_header{
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(./assets/images/background/11.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 50px 0;
}
.container{
    max-width: 1500px;
    margin: 0 auto;
    padding: 0 16px;
}
.content_wrapper{
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    align-items: center;
    gap: 20px;
}
@media (min-width: 768px){
    .content_wrapper{
    grid-template-columns: repeat(2, 1fr);
}
}

.content_area{
    font-family: 'Playfair Display';
    color: white;
}
.content_area h5{
    color: #f7b82d;
    font-size: 28px;
    font-weight: 700;
    font-style: italic;
    letter-spacing: 1px;
}
.content_area h1{
    font-size: 80px;
    font-weight: 700;
}
.content_area h4{
    font-size: 32px;
    font-weight: 400;
    margin: 8px 0;
}
.content_area p{
    font-size: 18px;
    font-weight: 400;
    line-height: 1.6 !important;
    color: white !important;
    margin: 16px 0 !important;
}
.content_area a{
    font-size: 18px;
    font-weight: 400;
    line-height: 1.6 !important;
    color: black !important;
    background-color: white;
    margin-top: 40px !important;
    padding: 14px 40px;
    border-radius: 8px;
}
.content_area a:hover{
   background-color: #f7b82d;
   color: white !important;
   transition: 0.5s ease-in-out;
}
.content_wrapper img{
    max-width: 100%;
    height: auto;
}
    </style>
    <div class="test_header">
        <div class="container">
            <div class="content_wrapper">
                <div class="content_area">
                    <h5>Hot Staff</h5>
                    <h1>Maxican Burger...</h1>
                    <h4>with bacon, tasty ham, pineapple & onion</h4>
                    <p>We provide the freshest food and our main gaol is users satisfaction.It's our crucial duity to provide the best quality food to the users so that they can enjoy to have our food!!</p>
                    <a href="all_products.php">Order Now</button>
                </div>
                <!-- burger image -->
                <div>
                    <img src="./assets/food-images/slider-item-3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
