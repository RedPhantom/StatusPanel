# StatusPanel
Show the your current Raspberry Pi status.

Coded in PHP and Javascript supported by Bootstrap 4.

StatusPanel Allows access to sensors using minimal traffic and server-side code. Uses jQuery to trnasfer the data from the Pi to the client. 
It then undergoes decoding and is sent to the interface.

Here's an example to a jQuery string sent to the client:

    ["36.856","10.0.0.7 ","46.116.5.216",["6","53",""]," 4.1"," 9.3"]

1. The first item is the processor temperature.
2. LAN IP (internal address).
3. External IP.
4. current uptime: days; hours (or minutes in case the hours value is 0); minutes.
5. Used diskspace in GB.
6. Free disk space in GB.
