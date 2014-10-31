$().ready(function() {
  // validate recall:
  $("#recall").validate({
    rules: {
      name: "required",
      phone: "required",
      name: {
        required: true,
        minlength: 2
      },
      phone: {
        required: true,
        digits: true,
        minlength: 5,
        maxlength: 20
      }
    },
    messages: {
      name: {
        required: "Veuillez renseigner votre nom",
        minlength: "Ce nom est trop court (minimum 2 caractères)"
      },
      phone: {
        required: "Votre numéro de téléphone est requis",
        digits: "Ce numéro de téléphone est invalide",
        minlength: "Ce numéro de téléphone est invalide",
        maxlength: "Ce numéro de téléphone est invalide"
      }
    }
  });

  // validate contact:
  $("#contact").validate({
    rules: {
      name: "required",
      phone: "required",
      name: {
        required: true,
        minlength: 2
      },
      phone: {
        required: true,
        digits: true,
        minlength: 5,
        maxlength: 20
      },
      message: {
        required: true
      }
    },
    messages: {
      name: {
        required: "Veuillez renseigner votre nom",
        minlength: "Ce nom est trop court (minimum 2 caractères)"
      },
      phone: {
        required: "Votre numéro de téléphone est requis",
        digits: "Ce numéro de téléphone est invalide",
        minlength: "Ce numéro de téléphone est invalide",
        maxlength: "Ce numéro de téléphone est invalide"
      },
      message: {
        required: "Veuillez renseigner un message"
      }
    }
  });
});