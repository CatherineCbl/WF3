import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
// 1 / On importe notre composant dans le fichier
import { NavbarComponent } from './navbar.component';
import { ContactformComponent} from './contactform.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    ContactformComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule
  ],
  providers: [],
  bootstrap: [AppComponent, NavbarComponent]
})
export class AppModule { }
