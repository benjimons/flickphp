## API
Flick Electric is a NZ based power provider, consumers pay current spot market rates for their power, since the power can fluctuate and become extremely expensive its imporant people can get a current realtime price. Hopefully this API can help people with integration and automation.

This is a basic PHP API using cURL, provide your Flick account username and password and it will return you a JSON representation similar to the following

This utilises the Flick mobile API

{"kind":"mobile_provider_price","customer_state":"active","needle":{"position":3,"commentary":"Your price right now is oarsome.","price":13.89}}


