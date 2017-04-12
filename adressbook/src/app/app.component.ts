import { Component } from '@angular/core';
import { ContactformComponent } from './contactform.component';

@Component({
  selector: 'app-root',
  template: `
    <add-contact></add-contact>
    <div class="page-header">Vous avez {{nbcontact}} contact(s) dans la liste.</div>
    <div class="row">
        <div class="col-lg-6">
            <div (click)=showDetails(contact) class="contact" *ngFor="let contact of contacts">
            <button (click)=deleteContact(contact) class="btn btn-danger">X</button>
            <img src="{{contact.image}}">
            <span>{{contact.firstname}}</span>
            </div>
        </div>
        <div *ngIf="details" class="col-lg-6 details">
        <a (click)=hideDetails() href="#">Masquer les détails</a>
            <h3>Détails</h3>
            <h4 *ngIf="details.pro"><span class="badge">PRO</span></h4>
            <p>Prénom: {{details.firstname}}</p>
            <p>Téléphone: {{details.phone}}
            <p>Adresse: {{details.address}}</p>
            <p>{{details.city}}{{details.cp}}</p>




        </div>
    </div>
  `,
  styles: [`
      img {
          width:48px;
          height:48px;
      }
      .contact {
          margin-top:5px;
          margin-bottom:5px;
          border-bottom:1px solid #ccc;
          background: #f7f8f9
      }
      .details{
          background: #f7f8f9;
          border: 1px solid #ccc;
          border-radius: 4px;
      }
      `]
})
export class AppComponent {
  contacts = [
      {
          firstname: "Amadou",
          phone: "0625893614",
          address: " 1 rue de Paris",
          cp: 93380,
          city: "Pierrefitte-sur-Seine",
          pro: true,
          image: "https://randomuser.me/api/portraits/men/85.jpg"
      },

      {
          firstname: "Goulou",
          phone: "0703569812",
          address: " 9 avenue de la victoire",
          cp: 75009,
          city: "Paris",
          pro: true,
          image: "https://randomuser.me/api/portraits/men/86.jpg"
      },

      {
          firstname: "Molo",
          phone: "0657429534",
          address: " 5 allé Boris Vian ",
          cp: 93380,
          city: "Pierrefitte-sur-Seine",
          pro: true,
          image: "https://randomuser.me/api/portraits/men/69.jpg"
      },

      {
          firstname: "Kanga",
          phone: "0678236514",
          address: " 2 rue parmentier",
          cp: 93380,
          city: "Pierrefitte-sur-Seine",
          pro: true,
          image: "https://randomuser.me/api/portraits/women/87.jpg"
      }
  ];
  nbcontact = this.contacts.length;
  details;

  hideDetails= function() {
      this.details = null;
  }

  deleteContact = function(contact) {
      let index = this.contacts.indexOf(contact);
      let validationDelete = confirm("Voulez-vous vraiment supprimer ce contact?");
      if(validationDelete == true){
          this.contacts.splice(index,1);
      }
      if(contact == this.details) {this.details=null};
      this.nbcontact = this.contacts.length;

  }
  showDetails = function(contact){
      console.log(contact);
      this.details = contact;
  }
}
