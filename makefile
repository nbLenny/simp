service: Simp
	mkdir -p service/ro
	mkdir -p service/rw
	mkdir -p service/append
	cp -r ./src/examreg ./service/ro
	
scriptbot_scripts:
	docker build -t $(SERVICE_NAME)_scripts ./scripts


