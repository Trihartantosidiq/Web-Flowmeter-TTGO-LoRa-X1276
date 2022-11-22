var mqtt = require('mqtt'); 
var topic = 'main/status/Skripsi/flowmeter_1' 
var Broker_URL = 'mqtt://habibigarden.com';

const mysql = require('mysql2');

const connection =  mysql.createConnection({host:'localhost', user: 'root', database: 'grafiksensor'});

 const conn = connection.promise()

var options = {
	clientId: 'MyMQTT',
	port: 1883,
	username: 'habibi',
	password: 'prodigy123',	
	keepalive : 60
};

var client  = mqtt.connect(Broker_URL, options, topic);
client.on('connect', mqtt_connect);
client.on('message', mqtt_messageReceived);
function mqtt_connect() {
    console.log("Connecting MQTT");
    client.subscribe(topic, mqtt_subscribe);
};
function mqtt_subscribe(err) {
    console.log("Subscribed to " + topic);
    if (err) {console.log(err);}
};
async function  mqtt_messageReceived (topic, message) {
	context = message.toString()
	console.log(context)
	console.log(JSON.parse(context).info.average_perhour)
	const data = JSON.parse(context).info;
	 var tanggal = new Date()
	  await conn.query('INSERT INTO `tb_sensor` ( `debit`, `total`, `average_perhour`, `Turb`, `tanggal`) VALUES ( ?, ?, ?, ?, ?)', [data.debit,data.total,data.average_perhour,data.Turb,tanggal]);
};



