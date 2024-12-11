#!/bin/bash

sudo systemctl start apache2
sudo systemctl status apache2
sudo systemctl start mysql
sudo systemctl status mysql

python3 /home/rsp-3-2024/Desktop/ProjetAA/Code/pyhton.py &

