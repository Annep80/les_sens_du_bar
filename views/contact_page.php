<main>
<form id="contactForm" class="contactForm row justify-content-evenly mb-5 ">
        <h4 class="titleContact text-center">Contacter Emilien:</h4>
        <label class="col-md-7 col-10" for="lastname">Nom: *</label>
        <input class=" inputForm col-md-7 col-10" id="lastname" type="text" placeholder="Nom" required>
        <label class="inputForm col-md-7 col-10" for="firstname">Prénom: *</label>
        <input class="inputForm col-md-7 col-10" id="firstname" type="text" placeholder="Prénom" required>
        <label class="inputForm col-md-7 col-10" for="phoneNumber">Numéro de téléphone: *</label>
        <input class="inputForm col-md-7 col-10" id="phoneNumber" type="tel" placeholder="Numéro de téléphone" required>
        <label class="inputForm col-md-7 col-10" for="mail">Adresse mail: *</label>
        <input class="inputForm col-md-7 col-10" id="mail" type="email" placeholder="Adresse mail" required>
        <label class="inputForm col-md-7 col-10" for="demande">Votre demande: *</label>
        <textarea class="message col-md-7 col-10" id="demande" placeholder="Votre message" required></textarea>
        <div class="rgpdValidation text-center ">
            <input class="me-2" id="textRgpd" type="checkbox">
            <label class="textRgpd" for="textRgpd">J'autorise Les sens du bar à conserver mes données personnelles
                transmises via ce formulaire. </label>
        </div>
        <button type="submit" class="submitForm col-md-4 col-4">Envoyer</button>
    </form>
</main>