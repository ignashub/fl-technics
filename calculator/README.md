1. Kalkuliatoriaus komponentas (Calculator.vue): Tai pagrindinis komponentas, kuriame vartotojai įveda savo skaičius ir pasirenka operatorių. Jame taip pat yra mygtukas, skirtas atlikti skaičiavimą. Paspaudus mygtuką, siunčiamas POST užklausa į /calculate galutinį tašką su įvestais skaičiais ir operatoriumi. Skaičiavimo rezultatas tuomet rodomas šiame komponente.

2. Skaičiavimų istorijos komponentas (CalculationHistory.vue): Šis komponentas rodo skaičiavimų istoriją. Jis klausosi calculation-done įvykio, ir gavęs šį įvykį, siunčia GET užklausą į /history galutinį tašką, kad gautų atnaujintą istoriją.

3. Pagrindinis puslapis (Welcome.vue): Tai pagrindinis programos puslapis. Jame yra įtraukti Calculator ir CalculationHistory komponentai.

4. Backend galutiniai taškai (/calculate ir /history): Tai galutiniai taškai jūsų Laravel backend'e, kurie atlieka skaičiavimą ir pateikia skaičiavimų istoriją. Jums reikia įgyvendinti šiuos galutinius taškus savo Laravel programoje.
