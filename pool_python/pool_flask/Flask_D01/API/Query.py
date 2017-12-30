def query_db(Query, Variable = None):
	db = get_db()
	if(Variable == None):
		query = db.execute(Query)
	else:
		query = db.execute(Query, Variable)
		db.commit
	return(query.fetchall())