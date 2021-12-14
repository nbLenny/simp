# ---- START AREA THAT CAN BE MODIFIED
FROM ubuntu:18.04

ENV TZ=Asia/Saigon

ENV LANG C.UTF-8
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN sed -i 's|http://archive.ubuntu.com|http://vn.archive.ubuntu.com|g' /etc/apt/sources.list

RUN apt-get update && apt-get install -y python python-pip mysql-server 
RUN pip install pwntools mysql-connector


#CUSTOMIZE YOUR CONTAINER TO RUN THE SCRIPTS HERE!

# ---- END AREA THAT CAN BE MODIFIED

# The final 4 scripts/binaries (setflag, getflag, benign and exploit) need to be
# put in the folder /ictf and that folder need to be in the PATH
#
# THIS PART IS MANDATORY AND IT SHOULD NOT BE CHANGED!
WORKDIR /ictf/

COPY . .

RUN chmod +x ./benign ./exploit ./getflag ./setflag

ENV PATH="/ictf/:${PATH}"

CMD /bin/bash
