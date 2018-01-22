import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http'
import { FormsModule } from '@angular/forms'

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';

import { LoginComponent } from './login/login.component';
import { LoginService } from './login.service';

import { RegisterComponent } from './register/register.component';
import { RegisterService } from './register.service';
import { MemberListComponent } from './member-list/member-list.component';
import { MemberListService } from './member-list.service';
import { MemberComponent } from './member/member.component';
import { MemberService } from './member.service';
import { MessageComponent } from './message/message.component';
import { MessageService } from './message.service';
import { FollowComponent } from './follow/follow.component';
import { FollowService } from './follow.service';


@NgModule(
{
	declarations:
	[
		AppComponent,
		LoginComponent,
		RegisterComponent,
		MemberListComponent,
		MemberComponent,
		MessageComponent,
		FollowComponent
	],
	imports:
	[
		BrowserModule,
		HttpClientModule,
		AppRoutingModule,
		FormsModule,
	],
	providers: [LoginService, RegisterService, MemberListService, AppComponent, MemberService, MessageService, FollowService],
	bootstrap: [AppComponent]
})
export class AppModule {}