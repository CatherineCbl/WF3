import { Component } from '@angular/core';

@Component({
    selector:'product-view',
    template:
             `

             <h1>{{title}}</h1>
             <p>{{description}}</p>
             <p>{{price}}</p>
             <hr>

             <button (click)=onClickMoins()>-</button>
             <span>{{quantity}}</span>
             <button (click)=onClickPlus()>+</button>
             <hr>
             <p>Prix total: {{total_price}} </p>
             <ul>
             <li *ngFor="let product of products">{{product.name}}
             <span>{{product.price}}</span>
             </li>
             </ul>
             <img src="{{image}}">
             `,

             styles: [`
                 li{
                     list-style: none;
                     color: blue;
                 }
                 p{font-size: 23px;}
             `]
})
export class ProductComponent{
    title = "Playstation4";
    description = "La nouvelle PS4 au design retravaillé. Des couleurs riches et éclatantes avec les graphismes HDR d'une qualité exceptionnelle";
    price = 299.99;
    image = "http://placehold.it/350x150";
    quantity = 1;
    total_price;
    products = [
        {name:"Fifa17", price:49.99},
        {name:"manette", price:29.99},
        {name:"casque VR", price:300.99},
        {name:"GTA V", price:45.85}
    ];

    onClickPlus = function() {
        this.quantity++
        this.total_price=this.price*this.quantity
    }
    onClickMoins = function() {
        this.quantity--;
        if(this.quantity<0) this.quantity=0
        this.total_price=this.price*this.quantity

    }
}
