import { NgModule } from '@angular/core'
import { RouterModule, Routes } from '@angular/router'
import { LoginComponent } from './login/login.component'
import { FollowComponent } from './follow/follow.component'
import { MemberComponent } from './member/member.component'
import { MessageComponent } from './message/message.component'
import { RegisterComponent } from './register/register.component'
import { MemberListComponent } from './member-list/member-list.component'

const routes: Routes =
[
	{ path: 'register', component: RegisterComponent },
	{ path: 'member', component: MemberListComponent },
	{ path: 'message', component: MessageComponent },
	{ path: 'follow', component: FollowComponent },
	{ path: 'login', component: LoginComponent },
	{ path: 'me', component: MemberComponent },
	{ path: '', component: LoginComponent },
]

@NgModule(
{
	imports: [ RouterModule.forRoot(routes) ],
	exports: [ RouterModule ],
})
export class AppRoutingModule {}