import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AdminComponent } from "./admin.component";
import { SinginComponent } from './singin/singin.component';

const routes: Routes = [
  {
    path: '', component: AdminComponent,
    children: [
      { path: 'singin', component: SinginComponent }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
