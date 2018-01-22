import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LoginComponent } from './login.component';
import { LoginService } from '../login.service'
import { AppComponent } from '../app.component'
import { HttpClient, HttpHeaders, HttpHandler } from '@angular/common/http'


describe('LoginComponent', () => {
  let component: LoginComponent;
  let fixture: ComponentFixture<LoginComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LoginComponent ],
      providers : [ LoginService, HttpClient, HttpHandler, AppComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LoginComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

	it('should create', () => {
		expect(component).toBeTruthy();
	});
	
	it('should be empty', function()
	{
		expect(component.login).toEqual({})
	})
});
