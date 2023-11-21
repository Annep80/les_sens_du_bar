<main>
    <form method="post" id="contactForm" class="contactForm row justify-content-evenly mb-5 ">
        <h4 class="titleContact text-center">Contacter Emilien:</h4>
        <label class="col-md-7 col-10" for="lastname">Nom: *</label>
        <input class=" inputForm col-md-7 col-10" name="lastname" id="lastname" type="text" placeholder="Nom" required>
        <span class=" alert-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>

        <label class="inputForm col-md-7 col-10" for="firstname">Prénom: *</label>
        <input class="inputForm col-md-7 col-10" name="firstname" id="firstname" type="text" placeholder="Prénom" required>
        <span class=" alert-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>

        <label class="inputForm col-md-7 col-10" for="phone">Numéro de téléphone: *</label>
        <input class="inputForm col-md-7 col-10" name="phone" id="phone" type="tel" placeholder="Numéro de téléphone" required>
        <span class=" alert-danger"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>

        <label class="inputForm col-md-7 col-10" for="email">Adresse mail: *</label>
        <input class="inputForm col-md-7 col-10" name="email" id="email" type="email" placeholder="Adresse mail" required>
        <span class=" alert-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>

        <label class="inputForm col-md-7 col-10" for="message">Votre demande: *</label>
        <textarea class="message col-md-7 col-10" name="message" id="message" placeholder="Votre message" required></textarea>
        <span class=" alert-danger"><?= isset($errors['message']) ? $errors['message'] : '' ?></span>

        <div class="rgpdValidation text-center ">
            <input class="me-2" id="textRgpd" type="checkbox">
            <label class="textRgpd" for="textRgpd">J'autorise Les sens du bar à conserver mes données personnelles
                transmises via ce formulaire. </label>
        </div>
        <button type="submit" class="submitForm col-md-4 col-4">Envoyer</button>
    </form>
</main>