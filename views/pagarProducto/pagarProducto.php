<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Pago de Compra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/pagarProducto.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper" id="app">
        <h1 class="titulo">Pagar Productos</h1>
        <div class="card-form">
            <div class="card-list">
                <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                    <div class="card-item__side -front">
                        <div class="card-item__focus" v-bind:class="{'-active' : focusElementStyle }"
                            v-bind:style="focusElementStyle" ref="focusElement"></div>
                        <div class="card-item__cover">
                            <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                class="card-item__bg" />
                        </div>

                        <div class="card-item__wrapper">
                            <div class="card-item__top">
                                <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png"
                                    class="card-item__chip" />
                                <div class="card-item__type">
                                    <transition name="slide-fade-up">
                                        <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                            v-if="getCardType" v-bind:key="getCardType" alt=""
                                            class="card-item__typeImg" />
                                    </transition>
                                </div>
                            </div>
                            <label for="cardNumber" class="card-item__number" ref="cardNumber">
                                <template v-if="getCardType === 'amex'">
                                    <span v-for="(n, $index) in amexCardMask" :key="$index">
                                        <transition name="slide-fade-up">
                                            <div class="card-item__numberItem"
                                                v-if="$index > 4 && $index < 14 && cardNumber.length > $index && n.trim() !== ''">
                                                *
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                :key="$index" v-else-if="cardNumber.length > $index">
                                                {{cardNumber[$index]}}
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                v-else :key="$index + 1">
                                                {{n}}
                                            </div>
                                        </transition>
                                    </span>
                                </template>

                                <template v-else>
                                    <span v-for="(n, $index) in otherCardMask" :key="$index">
                                        <transition name="slide-fade-up">
                                            <div class="card-item__numberItem"
                                                v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''">
                                                *
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                :key="$index" v-else-if="cardNumber.length > $index">
                                                {{cardNumber[$index]}}
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                v-else :key="$index + 1">
                                                {{n}}
                                            </div>
                                        </transition>
                                    </span>
                                </template>
                            </label>
                            <div class="card-item__content">
                                <label for="cardName" class="card-item__info" ref="cardName">
                                    <div class="card-item__holder">Card Holder</div>
                                    <transition name="slide-fade-up">
                                        <div class="card-item__name" v-if="cardName.length" key="1">
                                            <transition-group name="slide-fade-right">
                                                <span class="card-item__nameItem"
                                                    v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')"
                                                    v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                            </transition-group>
                                        </div>
                                        <div class="card-item__name" v-else key="2">
                                            Full Name
                                        </div>
                                    </transition>
                                </label>
                                <div class="card-item__date" ref="cardDate">
                                    <label for="cardMonth" class="card-item__dateTitle">Expires</label>
                                    <label for="cardMonth" class="card-item__dateItem">
                                        <transition name="slide-fade-up">
                                            <span v-if="cardMonth" v-bind:key="cardMonth">{{cardMonth}}</span>
                                            <span v-else key="2">MM</span>
                                        </transition>
                                    </label>
                                    /
                                    <label for="cardYear" class="card-item__dateItem">
                                        <transition name="slide-fade-up">
                                            <span v-if="cardYear"
                                                v-bind:key="cardYear">{{String(cardYear).slice(2,4)}}</span>
                                            <span v-else key="2">YY</span>
                                        </transition>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item__side -back">
                        <div class="card-item__cover">
                            <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                class="card-item__bg" />
                        </div>
                        <div class="card-item__band"></div>
                        <div class="card-item__cvv">
                            <div class="card-item__cvvTitle">CVV</div>
                            <div class="card-item__cvvBand">
                                <span v-for="(n, $index) in cardCvv" :key="$index"> * </span>
                            </div>
                            <div class="card-item__type">
                                <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                    v-if="getCardType" class="card-item__typeImg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-form__inner">
                <div class="card-input">
                    <label for="cardNumber" class="card-input__label">Card Number</label>
                    <input type="text" id="cardNumber" class="card-input__input" v-mask="generateCardNumberMask"
                        v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardNumber"
                        autocomplete="off" />
                </div>
                <div class="card-input">
                    <label for="cardName" class="card-input__label">Card Holders</label>
                    <input type="text" id="cardName" class="card-input__input" v-model="cardName"
                        v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardName" autocomplete="off" />
                </div>
                <div class="card-form__row">
                    <div class="card-form__col">
                        <div class="card-form__group">
                            <label for="cardMonth" class="card-input__label">Expiration Date</label>
                            <select class="card-input__input -select" id="cardMonth" v-model="cardMonth"
                                v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate">
                                <option value="" disabled selected>Month</option>
                                <option v-bind:value="n < 10 ? '0' + n : n" v-for="n in 12"
                                    v-bind:disabled="n < minCardMonth" v-bind:key="n">
                                    {{n < 10 ? '0' + n : n}} </option>
                            </select>
                            <select class="card-input__input -select" id="cardYear" v-model="cardYear"
                                v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate">
                                <option value="" disabled selected>Year</option>
                                <option v-bind:value="$index + minCardYear" v-for="(n, $index) in 12" v-bind:key="n">
                                    {{$index + minCardYear}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-form__col -cvv">
                        <div class="card-input">
                            <label for="cardCvv" class="card-input__label">CVV</label>
                            <input type="text" class="card-input__input" id="cardCvv" v-mask="'####'" maxlength="4"
                                v-model="cardCvv" v-on:focus="flipCard(true)" v-on:blur="flipCard(false)"
                                autocomplete="off" />
                        </div>
                    </div>
                </div>

                <button class="card-form__button" id="pagar" name="pagar">Pagar</button>
            </div>
        </div>
    </div>
    <?php
    // Supongamos que tienes un dato en la sesión llamado 'carrito'
    $carrito = $_SESSION['carrito'];

    // Asegúrate de que $carrito sea un array antes de imprimirlo
    if (is_array($carrito)) {
        $datosEnJavaScript = json_encode($carrito);
    } else {
        // Si no es un array, inicializa una array vacío
        $datosEnJavaScript = json_encode([]);
    }
    ?>

    <script>
        $(document).ready(function () {
            $("#pagar").on("click", function () {
                var cardData = {
                    cardNumber: $("#cardNumber").val(),
                    cardName: $("#cardName").val(),
                    cardMonth: $("#cardMonth").val(),
                    cardYear: $("#cardYear").val(),
                    cardCvv: $("#cardCvv").val(),
                };

                var datosEnJavaScript = <?php echo $datosEnJavaScript; ?>;
                datosEnJavaScript.cardData = cardData;
                console.log(datosEnJavaScript);

                $.ajax({
                    url: "pagarPDF/enviarPDF",
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(datosEnJavaScript),
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        // Verifica si la respuesta indica éxito antes de redirigir
                        if (response.success) {
                            // Redirige a la página para mostrar el PDF
                            window.location.href = "pagarPDF";
                        } else {
                            alert(response.message); // Muestra un mensaje en caso de error
                        }
                    },
                    error: function (error) {
                        console.error(error);
                    },
                });
            });
        });
    </script>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
    <script src="https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js"></script>

    <script src="<?php echo constant('URL') ?>public/js/pagarProducto.js"></script>
</body>

</html>