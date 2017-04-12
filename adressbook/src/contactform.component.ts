import {Component} from '@angular/core';

@Component({
    selector: 'add-contact',

    template:`
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Ajouter contact</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
     <form>
        <input class="form-control" type="text" placeholder="Prénom">
        <input class="form-control" type="text" placeholder="Adresse">
        <input class="form-control" type="text" placeholder="Code postal">
        <input class="form-control" type="text" placeholder="Ville">
        <input class="form-control" type="text" placeholder="Téléphone">
        <button type="submit">Ajouter</button>
     </form>
    </div>
  </div>
</div>

    `
})
export class ContactformComponent {

}
