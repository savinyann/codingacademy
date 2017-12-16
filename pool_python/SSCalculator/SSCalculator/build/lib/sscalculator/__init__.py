#!/usr/bin/python3
#from tkinter import * 
import tkinter;
import time;
import math;

dot = False
angle = "deg"
value1 = None
value2 = None
value3 = None
par = []
par_value = -1

def display():
	print(value.get())

def updatetext():
	Label0_0.config(text = value.get())

fenetre = tkinter.Tk()


def error():
	global value	
	value = tkinter.StringVar()
	value.set('ERROR')
	updatetext()


def add_0():
	global dot
	value.set((value.get() * 10))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_1():
	global dot
	value.set((value.get() * 10 + 1 if (dot == False) else value.get() + 1 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_2():
	global dot
	value.set((value.get() * 10 + 2 if (dot == False) else value.get() + 2 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_3():
	global dot
	value.set((value.get() * 10 + 3 if (dot == False) else value.get() + 3 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_4():
	global dot
	value.set((value.get() * 10 + 4 if (dot == False) else value.get() + 4 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_5():
	global dot
	value.set((value.get() * 10 + 5 if (dot == False) else value.get() + 5 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_6():
	global dot
	value.set((value.get() * 10 + 6 if (dot == False) else value.get() + 6 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_7():
	global dot
	value.set((value.get() * 10 + 7 if (dot == False) else value.get() + 7 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_8():
	global dot
	value.set((value.get() * 10 + 8 if (dot == False) else value.get() + 8 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();
def add_9():
	global dot
	value.set((value.get() * 10 + 9 if (dot == False) else value.get() + 9 * math.pow(10, dot)))
	dot = dot-1 if(dot != False) else dot
	updatetext();

def add_pi():
	value.set(math.pi)
	updatetext();

def reset_func():
	global value1, value2, value3, value, dot
	value1 = None
	value2 = None
	value = tkinter.DoubleVar()
	value.set(0)
	dot = False
	updatetext()

def equ_func():
	global value1, value2, value3, value, dot
	if(value1 != None and value2 != None):
		if(value2 == "+"):
			value.set(value1 + value.get())
		if(value2 == "-"):
			value.set(value1 - value.get())
		if(value2  == "*"):
			value.set(value1 * value.get())
		if(value2  == "/"):
			if(value.get() == 0):
				error()
			else:
				value.set(value1 / value.get())
		if(value2 == "^"):
			value.set(math.pow(value1, value.get()))
		if(value2 == 'x10'):
			value.set( value1 * math.pow(10, value.get()))
		value1 = None
		value2 = None
		value3 = value.get()
		updatetext()
		dot = False


def add_func():
	global value1, value2, value3, dot
	if(value1 != None):
		equ_func()
	value1 = value.get()
	value2 = "+"
	value.set(0)
	dot = False


def sub_func():
	global value1, value2, value3, dot
	if(value1 != None):
		equ_func()
	value1 = value.get()
	value2 = "-"
	value.set(0)
	dot = False


def mult_func():
	global value1, value2, value3, dot
	if(value1 != None):
		equ_func()
	value1 = value.get()
	value2 = "*"
	value.set(0)
	dot = False


def div_func():
	global value1, value2, value3, dot
	if(value1 == None):
		equ_func()
	value1 = value.get();
	value2 = '/'
	value.set(0)
	dot = False

def pow_func():
	global value1, value2, value3, dot
	if(value1 == None):
		equ_func()
	value1 = value.get()
	value2 = "^"
	value.set(0)
	dot = False


def perc_func():
	global value
	if(value.get() > 1):
		error()
	else:
		temp = value.get() * 100
		value = tkinter.StringVar()
		value.set(str(temp) + "%")
		updatetext()

def add_coma():
	global dot
	dot = -1

def exp_func():
	global value1, value2, value3, value, dot
	value.set(math.exp(value.get()))
	updatetext()
	dot = False

def ans_func():
	global value3, value, dot
	value.set(value3)
	dot = False
	updatetext()

def sqrt_func():
	global value, dot
	value.set(math.sqrt(value.get()))
	dot = False
	updatetext()

def tan_func():
	global value, dot, angle
	value.set(math.tan(value.get()) if(angle == "rad") else math.tan(math.radians(value.get())))
	dot = False
	updatetext()

def x10_func():
	global value1, value2, value, dot
	dot = False
	value1 = value.get()
	value2 = 'x10'
	value.set(0)

def log_func():
	global value, dot
	dot = False
	value.set(math.log(value.get(), 10))
	updatetext();

def cos_func():
	global value, dot
	dot = False
	value.set(math.cos(value.get()) if(angle == "rad") else math.cos(math.radians(value.get())))
	updatetext()

def sin_func():
	global value, dot
	dot = False
	value.set(math.sin(value.get()) if(angle == "rad") else math.sin(math.radians(value.get())))
	updatetext()

def ln_func():
	global value, dot
	dot = False
	value.set(math.log(value.get()))
	updatetext()

def inv_func():
	global value, dot
	dot = False
	if(value.get() == 0):
		error()
	value.set(1 / value.get())
	updatetext()

def fact_func():
	global value, dot
	dot = False
	value.set(math.factorial(value.get()))
	updatetext()

def rad_func():
	global angle
	angle = "rad"

def deg_func():
	global angle
	angle = "deg"

def open_par():
	global value1, value2, value3, value, dot, par, par_value
	dot = False
	if(value1 != None and value2 != None):
		par.append(value1)
		par.append(value2)
		value1 = value2 = None
		par_value += 2
		value.set(0)

def close_par():
	global value1, value2, value3, value, dot, par, par_value
	if(par_value > 0):
		equ_func()
		value2 = par[par_value]
		value1 = par[par_value - 1]
		par_value -= 2
		print("value =",value.get(), " | value1 = ", value1, " | value2 = ", value2, " | value3 = ", value3, " | dot = ", dot, " | par = ", par, " | par_value = ", par_value)		
		equ_func()


# Close Button
Close = tkinter.Button(fenetre, text="Fermer", width=6, height=2, command= lambda: print("value =",value.get(), " | value1 = ", value1, " | value2 = ", value2, " | value3 = ", value3, " | dot = ", dot, " | par = ", par, " | par_value = ", par_value))
	#fenetre.quit)
Close.pack()




# Display Box
Frame0 = tkinter.Frame(fenetre, borderwidth=2, relief=tkinter.GROOVE)
Frame0.pack(side=tkinter.TOP, padx=30, pady=30)
value = tkinter.DoubleVar()
value.set(0)
Label0_0 = tkinter.Label(Frame0, width=32, height=2, text=value.get(), anchor=tkinter.E)
Label0_0.pack(side=tkinter.RIGHT, padx=15);


# frame 2
Frame2 = tkinter.Frame(fenetre, borderwidth=2, relief=tkinter.GROOVE)
Frame2.pack(side=tkinter.LEFT, padx=30, pady=30)


# Pannel 2_5
Pannel2_5 = tkinter.PanedWindow(Frame2, orient=tkinter.HORIZONTAL)
Pannel2_5.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

base = tkinter.IntVar()
base.set(10)
Pannel2_5.add(tkinter.Radiobutton(Pannel2_5, text='Dec', variable=base, value=10))
Pannel2_5.add(tkinter.Radiobutton(Pannel2_5, text='Bin', variable=base, value=2))
Pannel2_5.add(tkinter.Radiobutton(Pannel2_5, text='Oct', variable=base, value=8))
Pannel2_5.add(tkinter.Radiobutton(Pannel2_5, text='Hexa', variable=base, value=16))


# Pannel 2_0
Pannel2_0 = tkinter.PanedWindow(Frame2, orient=tkinter.HORIZONTAL)
Pannel2_0.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel2_0.add(tkinter.Button(Pannel2_0, width=5, height=2, text='Rad', anchor=tkinter.CENTER, command=rad_func))
Pannel2_0.add(tkinter.Button(Pannel2_0, width=5, height=2, text='Deg', anchor=tkinter.CENTER, command=deg_func))
Pannel2_0.add(tkinter.Button(Pannel2_0, width=5, height=2, text='x!', anchor=tkinter.CENTER, command=fact_func))



# Pannel 2_1
Pannel2_1 = tkinter.PanedWindow(Frame2, orient=tkinter.HORIZONTAL)
Pannel2_1.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel2_1.add(tkinter.Button(Pannel2_1, width=5, height=2, text='Inv', anchor=tkinter.CENTER, command=inv_func))
Pannel2_1.add(tkinter.Button(Pannel2_1, width=5, height=2, text='sin', anchor=tkinter.CENTER, command=sin_func))
Pannel2_1.add(tkinter.Button(Pannel2_1, width=5, height=2, text='ln', anchor=tkinter.CENTER, command=ln_func))


# Pannel 2_2
Pannel2_2 = tkinter.PanedWindow(Frame2, orient=tkinter.HORIZONTAL)
Pannel2_2.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel2_2.add(tkinter.Button(Pannel2_2, width=5, height=2, text='π', anchor=tkinter.CENTER, command=add_pi))
Pannel2_2.add(tkinter.Button(Pannel2_2, width=5, height=2, text='cos', anchor=tkinter.CENTER, command=cos_func))
Pannel2_2.add(tkinter.Button(Pannel2_2, width=5, height=2, text='log', anchor=tkinter.CENTER, command=log_func))


# Pannel 2_3
Pannel2_3 = tkinter.PanedWindow(Frame2, orient=tkinter.HORIZONTAL)
Pannel2_3.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel2_3.add(tkinter.Button(Pannel2_3, width=5, height=2, text='e', anchor=tkinter.CENTER, command=exp_func))
Pannel2_3.add(tkinter.Button(Pannel2_3, width=5, height=2, text='tan', anchor=tkinter.CENTER, command=tan_func))
Pannel2_3.add(tkinter.Button(Pannel2_3, width=5, height=2, text='√', anchor=tkinter.CENTER, command=sqrt_func))


# Pannel 2_4
Pannel2_4 = tkinter.PanedWindow(Frame2, orient=tkinter.HORIZONTAL)
Pannel2_4.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel2_4.add(tkinter.Button(Pannel2_4, width=5, height=2, text='Ans', anchor=tkinter.CENTER, command=ans_func))
Pannel2_4.add(tkinter.Button(Pannel2_4, width=5, height=2, text='EXP', anchor=tkinter.CENTER, command=x10_func))
Pannel2_4.add(tkinter.Button(Pannel2_4, width=5, height=2, text='x^y', anchor=tkinter.CENTER, command=pow_func))





#frame 1
Frame1 = tkinter.Frame(fenetre, borderwidth=2, relief=tkinter.GROOVE)
Frame1.pack(side=tkinter.LEFT, padx=0, pady=30)



# Pannel 1_0
Pannel1_0 = tkinter.PanedWindow(Frame1, orient=tkinter.HORIZONTAL)
Pannel1_0.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel1_0.add(tkinter.Button(Pannel1_0, width=2, height=2, text='(', anchor=tkinter.CENTER, command=open_par))
Pannel1_0.add(tkinter.Button(Pannel1_0, width=2, height=2, text=')', anchor=tkinter.CENTER, command=close_par))
Pannel1_0.add(tkinter.Button(Pannel1_0, width=2, height=2, text='%', anchor=tkinter.CENTER, command=perc_func))
Pannel1_0.add(tkinter.Button(Pannel1_0, width=2, height=2, text='AC', anchor=tkinter.CENTER, command=reset_func))


# Pannel 1_1
Pannel1_1 = tkinter.PanedWindow(Frame1, orient=tkinter.HORIZONTAL)
Pannel1_1.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel1_1.add(tkinter.Button(Pannel1_1, width=2, height=2, text='7', anchor=tkinter.CENTER, command=add_7))
Pannel1_1.add(tkinter.Button(Pannel1_1, width=2, height=2, text='8', anchor=tkinter.CENTER, command=add_8))
Pannel1_1.add(tkinter.Button(Pannel1_1, width=2, height=2, text='9', anchor=tkinter.CENTER, command=add_9))
Pannel1_1.add(tkinter.Button(Pannel1_1, width=2, height=2, text='÷', anchor=tkinter.CENTER, command=div_func))


# Pannel 1_2
Pannel1_2 = tkinter.PanedWindow(Frame1, orient=tkinter.HORIZONTAL)
Pannel1_2.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel1_2.add(tkinter.Button(Pannel1_2, width=2, height=2, text='4', anchor=tkinter.CENTER, command=add_4))
Pannel1_2.add(tkinter.Button(Pannel1_2, width=2, height=2, text='5', anchor=tkinter.CENTER, command=add_5))
Pannel1_2.add(tkinter.Button(Pannel1_2, width=2, height=2, text='6', anchor=tkinter.CENTER, command=add_6))
Pannel1_2.add(tkinter.Button(Pannel1_2, width=2, height=2, text='×', anchor=tkinter.CENTER, command=mult_func))


# Pannel 1_3
Pannel1_3 = tkinter.PanedWindow(Frame1, orient=tkinter.HORIZONTAL)
Pannel1_3.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel1_3.add(tkinter.Button(Pannel1_3, width=2, height=2, text='1', anchor=tkinter.CENTER, command=add_1))
Pannel1_3.add(tkinter.Button(Pannel1_3, width=2, height=2, text='2', anchor=tkinter.CENTER, command=add_2))
Pannel1_3.add(tkinter.Button(Pannel1_3, width=2, height=2, text='3', anchor=tkinter.CENTER, command=add_3))
Pannel1_3.add(tkinter.Button(Pannel1_3, width=2, height=2, text='-', anchor=tkinter.CENTER, command=sub_func))




# Pannel 1_4
Pannel1_4 = tkinter.PanedWindow(Frame1, orient=tkinter.HORIZONTAL)
Pannel1_4.pack(side=tkinter.TOP, expand=tkinter.Y, fill=tkinter.BOTH, pady=2, padx=2)

Pannel1_4.add(tkinter.Button(Pannel1_4, width=2, height=2, text='0', anchor=tkinter.CENTER, command=add_0))
Pannel1_4.add(tkinter.Button(Pannel1_4, width=2, height=2, text='.', anchor=tkinter.CENTER, command=add_coma))
Pannel1_4.add(tkinter.Button(Pannel1_4, width=2, height=2, text='=', anchor=tkinter.CENTER, command=equ_func))
Pannel1_4.add(tkinter.Button(Pannel1_4, width=2, height=2, text='+', anchor=tkinter.CENTER, command=add_func))



Frame3 = tkinter.Frame(fenetre, borderwidth=2, relief=tkinter.GROOVE)
Frame3.pack(side=tkinter.LEFT, padx=15, pady=30)


fenetre.mainloop()