import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UserComponent } from "./user.component";


import { HomeComponent } from './home/home.component';
import { SinginComponent } from './singin/singin.component';

const routes: Routes = [
  {
    path: '', component: UserComponent,
    children: [
      {
        path: '',
        component: HomeComponent
      },
      {
        path: 'singin',
        component: SinginComponent
      },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutingModule { }
