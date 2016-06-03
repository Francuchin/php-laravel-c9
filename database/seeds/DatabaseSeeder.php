<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Challenge;
use App\Seguimiento;
use App\Participacion;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $imagenBase64 = " data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASQAAADqCAYAAAALbDicAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3AUdADIsHBNOVAAAIABJREFUeNrtnXl8XGW5x79nMlnaJE33faGF0kLZy1L2AmVHZTFVURERvVxQBBH3a6eIuC+Xq6CAoggIjQviAgqFKrJTKdDSFlq60X1LmyZNmsyc+8fznDnvTGbSpJlJJunz+3zOZ5KZOee855z3/c2zP2AwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwdC98Pb2hYEzvjF5gj//2j40nlfstUyMAB7x5qjfsqiEprmjWPfQHXPffSW5w/SLq6ZGd9UO0H+L2LwrsvO1kY+9RF2rgx9/fuWR/RLrhhCvkDe2U9Eyv/8j89iRaSylZyyccFTRDcsrU97dwX28MXbkk41rMl5AR8aTh/3aRtr1Zty3iWsSC056/1N1z2c6wvCzPvutw7xFX2rP/QPg/LdLJjfdcsmAyLbqUlpOKCI+WiZBgiLiq6K0vFJO/eOn+cv/8Om5ddtycl0dwD4941zM2zzM/c4/+xBFNG+N+i3zK/0df7gmsfD+6fOo7/g5M5yfi8nHmD3iLcV+y+ISGv9+WOKdu299eutb7TlDJPvEPahk4oyP/eBI/rm4v7frM6X6QAB8ioqbvdKj6r1+N73lTX752hkjvtsV7FnpzbmostW7VdzrV5zXe38zSnnYG/7D2KEUd/ZIo8/8/MUn7PnsmtGR9Q+V03RZNElGMhXiFI9ros9l2xh895OMfPb28ynp6qvt9DPOxbwtwLkfp3hQk9fnnC2R4T/7TtFxq287e/BphTxrfYqie7zSw3d5VZ9/oeiIpR+ZMfmnTKXPvhHSodXFE5unPTCOtZ8r2uupmzklvvOxvF/h1FeiVZE3r8z00Wv0+wTTKeqtlLTdGzlt+LABMzojCY+Z8emvHBxZ8MdKb8/Q9uxwmL/1zusfY0+XXmhnn3Eu5m0hzv30s3pVA59OjH/imbMqJ/aMGVzEBkZf+4H+k/8yYi+kFM305tAREz49lvnvd9/r69ctKfEjd++gYnUD5SMTnn9hH6/+nL5sWXtvtP7FvMsJ/crGDqb2aFS9GOAPvnebt+3jHrDNG3zCO5F1oybQuLrwdOIdLWMouXxlonR365ufaFlTp6J3myjm8ciwH8amb38qNo+mjo5h4FnfuXQCT3wz9dcnQSX1j/lE/9rgl63f7fetjHveUR7xi/qyYcyXmxvm3Jr368rtM87FvM3l3O/MPQr2XUFFS7NfMrzFKz6nLzsvTkpqXlXJL+k365W6NVd+smrQ+Qlakmu5kQPL/ciKh8rbGEfy/JWU53rM71DR1OyXDW8hemmlt+Pc4POt3ugzLxtQN/snrP1Cuwmp/GyGjPIX3OIal0ay4oHnSpZftSz1F/P2/mfeOnZ65I6D/vIEDV0rytdxECffNZfnP94PgH485JWfB413FRohRdjTuH7ny48/tTfbU6YH7Ee3+V7LQIBd3sjJfYo2XwZbH+zQQab3rxrFP+8oTvm92lF3BivP/9KTm59N+/avgc8dcfYR48qfadiYr+vKxzPOxbzN9dzvzD0K9n063PfOoTO+fvVhPHd3QEqb/P5n/oX5xa8+xeOpz7xf1dQISaZpcxzTcz/meeG+d42c8cVrJjH/zkDaXOKP+NyS6Vt/Onle46p2qWyliW9dNDBpZIYSNm58tGX5dcsyiO+1T31t9SNPrnuqq0X5fn7tws9Grnt9u99vYfDeAq+ql6ltPlO84tvqnEf1jDf8O5NOpqIjRxkQmX3ekBQ1rYEr40tmZCCj5Ilff+L1lYDfnepaR59xLuZtQc59B5uKfvf7WryW4P8mSofOq+x6O19HsK7l/LtX+kPmhr+y/Yt+U1Q5s502pJhXwaIPur8Qh7Dprtp98JbkT12D8dT+fvgTwxt2cNDDwXvbGHz8+kjZqN5DSB5j/fmb1zH+F6EoPnx0dZ8hV3bkKBXey1e4D3mUv6Zm6dN1Lxfa1XbuGedi3hbm3E9B0/aI5/vJIUa8xJ5RDSQKehrPmx7f7p1+uzvIZVRcWl2d2X6dqrJN21FaTu0hrtHupET9Ez/oxHjiDKmI95uxc8aMzEbBjovyjVzg1//pB0B9/H1/bIj+5xt9VaS/J1J+ATT+rJCeR1vXf7C/8P/umLvh+mz71vl7+tfFb/pGbfQzV/THLwaP+f7I2Zy1+UHmsm2vJ592Y1kFyw5zR3Omv+OXH8uB9NOZ68r5M87FvO3iub8v92h40RVX9PfmJyXEcurfed8uGh8okPmaDbv9M9+o935H8HzrvL7jB9VSBq3V3VRCSmwqLvX2DHYomcmJ5nXduqKnvhKtinw7KRWU+tvXP7OjYQlAfePvlm8v77Oyr7f7AIDX6X8V07fezTzivUFG2uVFqmrnTV619qzrbu/vLb0JoNkbMvBGf9j1P2JjbK8HSGwqLvWahuAs9CO9xuWh/aCtGJZ9jyXq8meci3lbYHM/QUnZqH6nnTf9rLL4HvqMTRC5qMKbf5b7nUP9Hb+Y+WY7f9W7U7CLf2pbc1E0jifqdrNfMmB9FodaqtjUtz4S8ROl7m0ZTqSxW0X5/v3GuKL8KG/bY7H5iAfghR81bmfsn8IlNOi4lZSN7i1KWwteKcCO+He/t5WiXcH7i7xRX1hzZp+Rqtlll3ZaPc84B/tF9YV2nZ1+xrmYtwU2932qoqspmRP1Er/v69X/qMKrSyGjKn/ta3+Mb7qrR0zkhlGJOJGm8Nq8aEVL5qDsVJaK7vJ932sBvySwY9QVJzoVkNeWG7EpckCfPax5sAo/mlWU50FHlG/hdL/hQfcp1PvnP7zHW/rZEhXp7ysqvwAa7ywcS1D26yfCsrZ/Jb0igIZ55RvXzrj524N49VZ5f2Cf27z+X4bdn/ETRc1Zw1vleTaDXxqccK2fKOvu68r5M87FvO3iud/Re+RigL/xb1+Mr7ni2HnUF9J8bYvsiwjnXYR4Y3kW21cqEXgjWvawdTvsGSZvlLAwHhkCrNzXC2zTjXj8+ZVH9os04ng2Wony3rc/7g73Xu+4J1P12x+n7PIG/a/6+dStd//XfFoKgZDauv6OuGg2Ff38jk3xk28cSvMggLcZfe1/prf8+Fyvz66sO20/pXlP/5e3QdOI4Hku9UqGQdM7osyvqU9oDEuzN7Kkni33DPRaBnTldeXkGedi3nbx3H+qQyQRbyny48tKvMZ/TfA33vvjuateqCnw+eqipCg2tNT7fPJns5Q9W4ZGMquaqYTU/ImmhqKfrsELHkopr0b6ToXd3eKVSRfl24Pt3qBjz61cOwoyxzn0WPx95/b1Zx739SGR537qAXhVkduLyr/R1yv7V9Z9Jixqqt9esdIlpGe8vtNB8+Lmz295FY1hmXZj2SHlO+qgZUCPe8a5mLcFNvfbnTvZA1DuPz21r6Og9WPX4qoXMgf4pgr786bH6/1R/3DfWuAPvGZODvKo9gWponx70Y9fRyovpBdic9PD9633y5IJpu96Iz90mP/uuKw71NQk6v3xj7pvLfIGX9vRWKaCf8a5mLcFNvd7DQ6dUzw48tznPMc6doRX/1Asi6e3lfWhPnLJb11f3A5vzJH/Hjnm5liWygBDplcPy0tA4tRXolXeQkeU38UEdl+eSCTek741Jg74UJ1zgW94lVe9MpVor3u4zy7dtZFTvxQq331pYvnNbe2yM/7RGvcntpERo08sO/D/Djq/AALqcviMczFvC2bu9xZUV0fGjPjnV8ey/bhQ8tta98XGPX/JasprRUgtTy9eXzTi0QO99e8NOOtNJn2zcsbI8y5JRB9qiPRZ3+CXVsYpOtzz4uf05Z1Dy1sY/Ai5dQ+ni/ID/M2v3BVfPiejS3/6U0UTIjNvrGTb8QC13uCpgweuHQ1NrfR/caeefN6ZZ2bK1dnesnXHq0/Oz2B/6ur9smFr/St/WFdRsXQ0uyapgaHNBdE0b8o768765D2TvBVXh5LV+CunNA8+8cizvHvq/b7LGr3SoiZv3UEJv3FYe8eRi+vK5TPOxbzN9dzP9bPvCnRmzMG+Z8yoaGlMlI/3t+25vMJbOhVHOjrGX//Vv/9715Z2ExLzYvENM5ZcU8VNxw+maXjwdh2VpxLhVIBSr8k5RdeI8gezc07W+KJ5xHfNmDgHXjw+EOl/5fe7EDb/NP2r4k5lTiSS6YZGGFNJ//kZJlhX75cVL9Q0bjjrzpuGeb//Szt1CX9N0/durir7+InDqZuSXHxUTsLje3gQpZkoW9tRHSu315XTZ5yLeZvjuZ/zZ98F6MyYg32LiFMe2dnq81Gs+PXW2o1tesAzOox3Pzl5/cqWT07b4lcuKAxRfjfn+g2Pt7VLPRf93aX0hVT1TrUNqF0/6B/rGNB+Y+u/+9eu8m87baM/8K/tn5l+oqc941zM226f+70SjRzgr/jKwu3vXH3XXiTCrAXaauddvGpB7R+PW5UY+aEGyh5voag2/DTuF7FnaV923XUQO6YfNY+d+VTXSv3adffvqG8zBqJ++73Laylbmxw/g47p1790TK98vm/ObF6fuPimjtQhqZt7yLY35s55zzJv4ul1fvl9eyha5f7CR/x4fdRvWVjqN9xX5W+96pz4mpH5jNLO1zPOxbztzrnfW1Dkt+wo9hv/VZXY+sUPJN4ads/c5d8qNPXUYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBj2D3h2CwyKwUApUAJU6VaKJGC7KUYRJK80AcSBJqAOSbhs1P832e00GCEZ2ks8VUA/YCQwDhgBjAYGIg1P++t3+ioheRnmTUK33cBOJaRdwHYlpHXAamANsE0/W2u332CEZBgNjALGAOcAk4BKJZ8yYI+SSgNQD7wLrFcS2QO0KPkEcyair0VKbEOA4cAAPWaFHtfXY+4CNgDzgdeAjUpYRlAGI6T9BIcDk4EDgOOBo5VAdgCblQzeARYrQWxU6aYZaMSnsc0WS6koVgIqUTIaqtsEJb8xDmGV6DleBZ4B3gTeVmnKYIRk6EU4ADhFiegM4Chgi0M+rwL/At6hmlpqshRD8/FSyMjHY7bOlVnO++0nrD6qGh4CHAocCYxXya0eWAQ8CrwILLTHaIRk6LkYBBwEnAacDkxDDMtvAC8DC4AlwDJ9n4xEEyNCNT5T8FmExxT8FPLJhtl4zMJPHifYV46ZrchbpY75MCXN45SwVul45ypJLbPHa4Rk6BkYpwR0gapjZap+PQ38B3gLn9VJKcbXZz2TSJIwshGP14nKxMF5AqKaqR664Dytj10MjFWJ7kzgWL2W1cA/lJyetcdthGQoPAxRdewEYKqqaHVqh3lWiWgNYogWqWeRPuOAhFzymY1HjAQxIsRIJMkkF4TkniNAcO6ZRKghQjUJ5pDAw1c1cbiqddNUrTsQqFWp6QW9vndsGhgM3U9EFwN/RQzPS4HvAUdRndZ1pJoiJYUoMSL4eMnX4LNgS/882DoD9xjucSGaPL+oh+Hf7v+pGAP8F/BvJHRgOfAlJS2DwdBNqtkdiJv8deBW4JDk4g2Ixl3g6WTgfu4ShksI7nudhUt4wXiykaD7Gn4/mjaeQcCVqsJtRuxjlyOeO4PB0AUYCHwYmKe2oR+mSETpCz7mRFO3h1QyfcfPkwrfkeO6ROQSrLw/HLgO8RRuBGqQuCqDwZBHHKdS0QaVBi6DZKfZaFKCcKWbTNJPW1um7+RSQkpX3/Y2nkxjcKUnKHHGNhn4KuI9XAl8S+1Nhh4OM2oXFgYBHwJuRGJ3HgHuwGcRs/GSBmqAOSRSDMaBUdrLW+/OroXrrQu8gYvwqMEDWvRaTwJuQGKvlgB3AnNsGvVcRO0WFAymAJ8CZiLxOD8Bfg/sZqZjuJ6SRjgxiogRz5u61d2Q0AEvScISthAk+D6LeBg/AlyjhHQoELPpZDDsO94L/BMxXP8vrhepmqIUT5RrNxJ7UjSjdyyburQ3Va09+7X3mJ2Bq4q6qltgnA/uRTj2U4CHkLCAG5DEYYPB0EFcB7yFGK6vQ7LsSbEPuWSU7qZ3SSrX5NARG1S2fXNx7iBkIN2IL58VO5L+MOBrSOzSr9TWZDCVzdAOHAVUI5HWrwL3IB61ZpV8wshmH5iNRFa7r640Ua2qTQw/uZxdN7os3HKk/EgJkmgbEEYCyehvRnLLZPNooZo4NaoSulHXvmPfmeMEVQbIlS3LPecihwhnEwRd+lTjA0XUsBG4XUn9AuAW4F7gMZtuRkiG7LgW+B/Edf0V4G9JFSywj8RIMCstynm28wph6keN7iPJskV4lAGDiHEAEs09DskbO0KliGxkEZQWWav2mdeo4R1gGR6bgd3EtD+7R1EyV80jSjWJlGjwXER9Z7MleQ4h+sST6TBTiDCLOjxuVhvcbcADSHjALMRraShgmJet6/F54AtIkOPXifFCUsIJPGfpGfWuxwmHjGo09UOkpL5IZPMRKn2dqCTUTFjFcTVSk2iLklKzvpYh1SH7IyVDhiD1k4boHAmCMv+DxACtABpVMhFjcyDNpKeo7CshudccI5GMv3K9bdmSdwOpzaO/3uuPq/T5Xb0Gg2G/xyDE+7Md8Z4dnrSPuLFF2aKt3Yjr1PicocDZwHeQ7P4NSJb834GvAx9AcsPGA1Wt9nc3WfTlOtaDkaDDG4HfImVBNiAF1r4LTHXSPYqTx80UEd4e4nG/myn9xDVmp6fLpEPuS5n+V6lS6BYkBWWaTUXD/o6Bas/YCTys5ICzuKLJxewSRuao5ahzzAuA36mKtRJ4HMn9mqKkkmnRlxAYicWuVJy0MbnnTkUfHfOHkXy6d4GXlOwGOep/FDeHrqNG7fR9sh+nVFXRY4GTgFP1dRpwUIbvlyOet81Iku6JNiVNZduf8TXgJqQI2f/gs4aZRFJUtNlpzyL9PVFT4vrLfwhwNRLBXafqSI2qU43JfaopUvsSSRuPW6/IVa0CdSsMKfCpwdNXt5BbX5WcrtWFfS/wfWC12sBC43OQyb83Egqz/f00KcetqTQASR2ZhERlX6IEFKidgdT0KvAzwiqY64Gt+p0r1Za0QlXnF21qGiHtb/gC8GXgz0i6wxqghBgtKXYW91c98F6FhBDRhTcICZy8RiWkx4BfE+P5ZKT27GSYgJ9Sgyi9FIlbC8mNhm5LDRJDe1DT6EDEMH+uqkIxpKhaNPk91w7W1nGzk2+x2sWmKfkdqTayepU265Rs9qgUV6l2sEH63nqkQsB/1Ha2AjhLn8cKpHLAyzZFDfsLbkDKZsxJqmlQnDUHzbUVBWpVaC8Zrrab9cBTwPuTdhJX/Uq3D2UKaswdqoCbkcjyx1VVhGzBmtntPaSorOH1Xq22sHeRnL6HVLK5BDhZyWkiYe3uI1R1+7D+ENwJPK/jW6Lq7Rf1/a1qyxtt09SwP+BUJaN/EAbolaTEBmWyFbm2pZBQRhEm297NvtYDqk52CRmoKtBAxCg+grAryXiVfg7WRX4wUm52gtptRug+QcH+EiWOlcBvCEqCZLZFtWU3ijpkNEmvcwPwnEoyx+rYO4IyHffFSLWEf+s4FyIex93ADxBvosFUtl6L0aoWTNFf6pd0wYnqUpMkoHgrlSaM3wkCFyOqGn0IuA+4B591ePTRzwKjdB/E2FtK2Iqoj9pWhuqii6pUU4wEQwa2l+AYRc5rhLBBZBA46auNqkVVoiCIslTtWWPVnvS/SHcT2kVIgZoaowipdHCTSj6PA79ACtIF9qailHlbTULvp+fcrxathOmGBUSReKwzEWfAwfp/IxKzdAfW4NIIqZeS0Q/0l/lclZKKUxZO8HeqTSY08IZueJ8aPqM2o18h+W6H6EIaqFLNWCTYsdQZQwTphdak5OEpQaxFYorqlbTGKGkFTR3rdb9m3RJ6rICoyvT7xWqrGal2myp9f7QSoahLgd0pGxEFtrPZSQ/ih5BgxgVK6Euc83tKiHGCEr2uDSooixtGbpPBSO8a5wcBF6pafYSqc1/BSuQaIfUiDEY8alcgMUA/AYrxNbo58Kx5SdWkJcW7FEpHUSWtw4H7lXA26iLydFE2EPZX266Esx6Jt9mlv/Z1SkoJwoaNu5VYzgWuUvVsoapbT1JNfdKY7qImOVc8h/SCVttBC+7LkNpEd6ttaXcrL5qfEm3tRnMfoffrFFWtVjtS3B4d9x7EGP2CXl+DI8EJiVbTkiQeV9p0iTEgSiGro5CQjBnAj9TGZDBC6hW4DglQ/CNwM9VsTiti72dUV1xCCtsSDVW7xyWIh2gBEvC4WkloB6G3qRFIUK2LLlOHj1ASqQKuBz6mElJEF/RyJaX/a0VKNUnbVni8KZreEh43oerQA4SJwotbNRBw2yWFZBdXiejLei3bCWOkih31MVAhNypBtThku9S5P+v0vtTq95r0uM0ZpTSx9/1Y78e1Ki0ZDD0a0xAX8lP6a0+rWtaZiumnRyiHht2TVRp4FTi6zcqQqZHWxQRBjq63LqxT/UmVrHzChFpft01KVKlVKbOPP0jaDapZnqYqz/MqeZBSctcdb2oJkWLEm7ZeSWk60m13OnC+Sl6fAD4LfBNJRP6DSlKvKRm9hXjT3lVCWkfoWfsOYni/EAkfOBAxzvcH+ugYL1FSflUJytANsOTa3GAk8BnEePwNJO8ryhS1EQUShE/rmJz0/yUvzMNjmi6Y+4ClyWRbsZV4SZvKTMdeIvuKRDZF445iJJKvHlFdlAOUgDy1zwRjGKIL/9/4vINHET7xlK61roQjsU4Jp553wlHnwtyzmjQpLahWUEMRU2hBvHjHIQGevwVWtml/ChFUMKhQdXms2tVGEDagPA1pGxVR4vSU6Ncrea2lRl/l/B9Tm907+p7BCKnH4b1qg7gXeFJVAS+lTEh7Y4CEoIp1MfVB+t4ngGI1eCeSyaxuWdvAsBuUBsGpClCTDHosQ1zqRXrMTGMaA0zEYzkQYbYT5OglJSnXthQQUYkSaF9Vl3a1ui4/ScxCrDFadPwH677rCbxzIvGlJtG6pWxFFW7GZwcetfisxWOB3vvj9TqCMbyr0tS7iLNhpBLXKYhRvlzVxECtuwBpuHmPTW0jpJ6Gk4D/VlH/bnx2q2TRkvQe+Snenfba9ipUpdqFmw4Swy3Q6qfs4WeQKAJJRhZ13DmW5xCSS0wNujgB9qSdr5SwMkBf3SoR79poXeADCBo6+jqqGK29aqlR4XG9lsGqTq3AZ1tSeowpQU1xpMHAMTCbBDE8dQTE8ZiCGNUPd44/Wq/rr8DPlYAqCdNRxhKmpDSpyn2DPtP5NsWNkHoSrnRUteV4mjoh0ozU60lPDdkbpCjaCqS99HsQ71Kt/no3IN6zBgJjtizmBB4JYsQdVSfVqO2xRxfZISrR+GmE1IKktpSrTaxECWgA4uEbpH8PUPIYpluZSkVj1Q71MtDM7DS1yzXap+a7vaL2mwtU3VqExyK1Da0CNhBjZ9pdSqS0B/dpxmMQ0q/tcMcuFkiGF6jEeZ2qbBt0W5yUyGKUqrT2NbVbnW6E1LUwL1vn8AE1mEqemk9dm/WM2pNoGnqsZiIBhoN0sW5TYtql5LRTtyBgMa6E1ahk1aTvFakkU6x/Hwuch0Q9u8+/Rc/xtu5foYQUSEFRPd8OPfYuhxxX6vc+guTXfQnYkjGkIVA1XZuUXO8vkHSYRTqukXquZXr9KxDv2iYd51ZCD1pcwyRORgIcpzg2Mpy/a9Um93/EeIeYSlWB1CXElNB79DPd7xNqEzSYhFTQOBXpIvsq8DWqqU8ho4CI0uNv9mY/iiX3+asu0CByeYNKJlUqlRyCpHkEXrmgNEng+YoSxiwFKmOTklaNSg2Hq0SyDngCCS1oUOKrU9IJthbHxhLX/wNMR2KIFiJxSFvU0N2amL2kjSsdTyCJr3NUreqr13mcbhepJDpUJZ3dahNaDiylhuXAMUh6S6jEpqqm/ZVs+ivx+A4RBcb9CPAKEtx5FxLkepVKjgZDQWKQ2ilWqkrV2r29L3Dd6fL6HiWLTyY/D137geSSvvXThTdEF+9gh8j66VaBRHofg5QSOZogpcTt5uEilkJ4USdX7SRdwAuA6Uk3fnpy7d47mRwIzEXSbI7SvYqda61SAj5ZpZZvIi79NwjLjGwjNYwhfduIpLZM0GOWpl0LaeN9EAk0/ZhNeUMh4xwkAO8eoE+r7P3OElIYm9MH+J6qQcfqtwLDshCDm4ibjUjS229nigkKCcAt4BZNqQTpkpF8d4aS0WLgUuf91ovcJaL02KaQgK9Slez7QP+UapSpcVtBGstAJZdjkYYJNyEZ/LWOWhtEp+9RCW8JkiP3S8Rc/kngUqTq5klIX7dReuzrlMj+rOcxGAoSdyFxKmc7Czna6dZDqeVHivU449WGMRc4MoUc0okwvSStLNyQYNzvuGSWTj7u99OPK2Mq1UW8VtW0S7O2aspESJlK9QqGAL9WaeejKaSbfj3p5Bt+Pkwly4vVpvUZpGfLz5E4o+cQL+BCtU+9qyQYkNhGJdhnkVCBuP5/jk17QyHiBMTzI9JRprKznSGkUP0LbEHoolqnC+ocoDxFckmvY+0u+Gonm9+tSZ1JWkmXiNKJQ441AYmYfgOJSj+jFXFlu/5MklkqCYM0JngaMW6f04o00yO9XWJ2G0em34PwnpaqKnsI4sWcibj4f6yk9QskOPNPSMT5FsS4/jWb+oZCxK2qrl2YlI6ypYXsKym1PlYZkgn/BuIFm60LtyyDXSZUmdLJcm81vNM/D9EHqTDwQaS+0yYk7218Ujppq3NuOhm1RVKC6aoKvqRqYXGSEF2yTP87kzSX/l5banIqOfZRSetdxID/lN5zQx5hbv+O4UCkLvZS4Gpi1KaUhW1v2da9SUjpJWchiNc5RX/NT0MM6jWqyq1Qg26ovrilaYPa3dmQuWVRsapQ45B4nPORFI+1KkE8DKyjmqKUBOK2rj+bxzG43lnJgMfQRmt9AAAgAElEQVQWPd+tOo7bgL8R08jrGCVU09zquoJo9fR2UtlKBEOQOBzRtRDEdKFj+ARSAeB1xFHwK7VvGQwFgRvUxnCF/p+auJorG1K6KhZ6twI7y6cQN/lmNdL+VO0lxyHxO332YQwliPdwktrGbkRc8Cv1PP9CEl9d4240L9ccqqrT1Y6zVslpfIpK6xra0ytw7m086VKVqybL3xV6/c+oNPw0kgA80paBSUiFgOEqkXjATKrZqL+w8WS3jc42RwwWSnrDxdRf9LgzngvVDjIF8QqtR7Le30bilrYT1kpyawcV6/f7qNrXHzEGj1EpaBwSQrBapYOXdDGuTRJRUGiurfIqHZEKZ2ZQp+Rap6r95jTgSaS8yUvAVmLEtSFAhJiTntPe55BarTIoiBcEkn5Uif8upAb3LUgU+BdVOjQYuhVXq3T0saTU4nqkcu32TzdUtx1a0EcJ6mSk1tHtSp4vKBnVqpSzRV+3IoGPq5A0j78hcVWzkGDMw5D4pZKUs7ieNLcGdi6uOb3BQWtj+mFI0OW7qqL+RMm4X0rjyGylUrIZ/VsbyU9FwgKagOsdu9PRSoR/NinJUAiYA7xJ0KUik0cnF4vTPWamBZtp0aUaa0tU3Rig0s65SL7dpxHv2OeQZpKXIflqE1UN7EdYG4gs7v6QmDIt8M5ec6brTfXAVSDR3A+p5LcS8YZdpddRTkezD2LJypdHqa1qKRL9fQMw0FEj+yJR21uQvDiDodtwuv4q/zRp38hPWyEyeqayfd6WZJX6/SB+J9iKM8bxtO52svfx5PKaM8UtuZ61cFxV+kxuR8IDNqvk9BSSR3cEkug7REmsgrA6QTlhlv+Rqpr9RqXFrUi1zzOA0gzxVO9XEvy8LQmzIXUnbkaigD9OjL9n9d50xpYSLMJsdafTz9EeuLYn19bjeqDcJpGzMhSPy3R9mb6Ti2tOv3a39nWqVyyoRV6m6tMliAF8iNrC+qoksxYJaqxT21lc1duRSFb/aCXr7UhO4u+Bp6mmNqUzTJgAPFFVxRYkNswaAhghdQseQBJR30tQzVCkikRBjjZTZn16eIKbcZ9OKp0hmFxeQ0CcgZE/7C4SFm0LQwWCTijHqR3oACSItZzUMitBXttaxHP2htqGllPNnmQTBrdzSdhJtwT4ts6Dq5FAVYMRUpdiEmLIfFpF9bp2lxPpzsXsSkMuXCkok6QUSFKFdB0uQaXHVQVeNvCIaQUC+cEoRwzhk0ltEtCoEpOkjlRr6d+g35tPi5b6hRjxJHmHTRM+guTAfRfxwBkMXYr3Iy70qzLaWApZQkpNXM0eJZ1uoymEa8vmfUtvve16O8N2TKVtGslTj5ma8e/a4lpHb6P2qfmIV9Jg6HJ8DzFon+gYiMmYhlBohJTNzZ3tfXefQiKktlz46a77TKTSuiJC9ty+tskLVQtrVGKebMvD0JUYBLyI1GIenuICL2RCMmSXtPaVcFMTjb9BkPxryClsUbWNiYhH5kVw8ta8DB4pQ2Eim8yzL8cJvW3PIRHuJ9oNzi2shG3bOBTxyCwD4tQQoQYfP+mlMlLanxAmO69CwgrGIhHtW+zmmITUFTgeyQF7h6A0atBRxCSk7lPB2lLFMqlk6Ub9TGk47T2WYDMSNjBO1XqDEVLeMR4padoArOmSiGXD3onHjZlqa3OPky1400uLwcq2+U4Ml6AOiQwfhiQpGwx5xy1IPeYaxLNSnFLky4za3U9UgXcsewVMWpGaxCedrlu0VehDW8X2Up0ZNyKF6qrtoRi6Ar9ECsP/EKjM6Bo25Jd4MlU5yBQCkOm99OOEbvuJSCmV14CLWsWWZao4mU6Cgg8juW/X2sPKHcyonR2lOuFWAy3UaJ2iOQWaLtIb4fZwC1Qn8XJFkhHbLtx0mHQVbQo+NYB0INmCVA34EjVsxecFjdQO01FIO29mO9JOsyGZDamrUIkUPBNCkuJdEWbrRJ9tElKXqWez0zqUzNJ0j9kZUmMWZbEVQVCTex1SzP8/SP2oa/EYqUm8RRnHkJmUtikhDbUHZcg3RiORuE8gWeTRlKJs+7vKlq1Gk/tZtu+2bd9hr73c0ov1Z7LxZG+5FDSejCINC9YhRfc+kVJ4LpPa1lplm4y0SnoQK9hmyDOORUq33gkckLGXmBFSdhd7Wx1rs/29txZKIYICdIOQpgvTkPpFU5GYoMzja90OKYrURt+mPz6HJL/XFoGGZDgYeARpsnCwLRmzIeUTQVGvjcAOLXkRN89aBswkgu9k30vpjgS+2mNE3fKYnVzQ8vcsfKopwiNCNYlkrfAYIPa7fqoOjVIJZAziZh+iZFSu3ykFipA4sdXA3Xg8nFJDKeaUEglexRYVtJUap8dfnBxzNjvS7KQaV494YUfrGAxGSHlDUKqiBYgzBZ85zqIyD1uIKWntllBicWsYpbYkCuZcXEle3q/hQJU0Juo2Galp1EcXfKmjbvlIfFi9vjbpD8jp+v3HiLETqfvtE1OSdBsnCPEl9BkHf5NSKypTfahY8u+47hPFbLFGSHmG1MaRydrSyrMTVDPc31NHAiKqIZ4k6WBBB4XNZjr1i8T71YJHETH6AAcS43Ck+N10lVTKHOLZhqRpBJHRa5GGBfX6ulX/blIJ5wY91lhivMmiZK2jcDyBlCPPbiBSynazbuE1zcQj5kTkt64tldAt6OlmMELKq4TkOZMulAZC8T34ld1/MStZfdFLUeFqki3BfVXFPGIUEaMvUjTtRLX9TFFCCObhamCBqk7LlIA2KPk0JiVW8JMtmEJJph6JG2vW77qR1aQUdouRoJoiajhCpbAXVD0nWTY3vUyxp9cadkLxqcE3QjJC6mp4zuKDWQVeLdJVMdruENs6VmdvNb0z/e92yY0l1almPZb0f/OYjOQFno20E6rQIzQr8bwAPIZ0/NgC7KaalpTqlYGEElN1ugZP1b+AEE9Gere9CbybEqfkOz3bwtrcUbVFNQAv47MR8JiZ4blmf9bBuY2QjJDyCrelcrhw3VrahVB3OjuFtm6UGHqL/Fafu7lc6dfVFmEFhuPZScmiRUlpMB4TlCSmqzRUofd1O1Jx8QXdXgNqidGcvK+ugTyQVkI7VCi1hk0AjkCaOpYhda4bqaGE2RmeT42S2iJaqGEeEij5RMrzdW1g6YGZsx1pucb5wTIY8oiz1XbxRYK21G33Qis8CSl4dVNexDN1MjB4r1nxmdI20lsTpaZlVKkK9kngfqRdUKOqW28jfe1uRgrw98fNIwvO6cYYpVayjLZqeR22exoL3Kuq3Fy1IZFy3W61SPe6g7bdbVWeTL8v4XOPIulFi4BjbMkYuoKQvgSUpwTE5aIhZFcQUvpilAV0LlJK5f1k6jzrBgSG5BBt1VE2RJnaYC5FYrYWIQbmerUH/QlJQj0ZqEqJM2qrNnnruK9oGgkFdbQHA99RMloCvK9DPxZ7qzWe6fvhsUuBXyHNAo62JWPIJ05W28a3kLgX0hZ34dfUdhezLLDRwD3A8wTm+fTuu5nqULuF9UMSmoqUcX0FMQY3K4H/BmkPdBwwgqDYvnusVImtfaSa3rJc/j8eaXndqK/HtJKM8kXygkrgt0gLpcNsyRjyiSMRb8/dwKSsxfALGS5xylgPQvrL/QkJMMxcuCyMZC5OszVOAGaqmvK6SkE7VU36spL4yBTyco/X0ZbjroQnxyhxJKTT9LzNwD8JGzCU5LUjTKqENAJpj/UPvbeGHMCM2pmxXRfbaGAoM1mW1mCxZ8QfiRE6wiJ8wiz3ZkgxHoeG7Zna40xc6nE8BiJpNKep7WciEj1dq8Q2R4l7E9CQNHoHquAsEsyGNiskZCOPwMgsnrZiqjVA1eNcJJLoGCSX7GvEeJGZRKjWPmr5glxbQEj9kJbcq/XeGgx5w0BVA14GLkxRF9wiXj3BhhTmbZUg8T+nA6UZWx/JNZUg0c5nI33uVyAVEnerivZN4HxglBOTU5SypXdnyVQ4rS0pJn38oQ3rY4hbv1klkxNSVMGukGDD5NqpSsY/I8ihMxjyiN+qXeS/1W4S7THJtdnKv4bqWGb1LlSPBgLfV/vMRuDXwEeRBNSKVt/PREAdVc3S9001uA9EHAwbkODHh4HJbXoC8/F83L58Es7wNlJZ1GDIO36FeIy+jxgwo8mtJ5Qf2Vvjx0xZ7KlS0jFINvyJBG76YL90Esp2nmzEmOkz13Cd6hmchoQR7FBJ7ceIq58UJ0NX3dNQQpqpqupnbakYugK3IYbb+5AYm5JWZWx7moTU3rpD6S5/9/3QsJzZDrQvxmuBkH1IREOR3LTFKqm9CVwH9EshovZcXy7va0iA1ytJfsSWSu5gWcrZcR8S3DcJ6ItPs/4uRgq+YqQbiZ2tI0e2KPNFznVV4+NRxExND1mkSaqBRBVISOnpJu05T2tpLY6vJV4k1WOcLvaRwN+A/wLuIcYu5pBgkUM+Hbm+ziCIFhdSGqnq7FpbKoauwv1qJzhC/y/utUX+UyOQo8kKi5nielxJqbMSiWuPSo1/GqCE9FFghKNKhkGSqePOr4QZjFH+HoDYGOch0ekGk5C6BI8iEbnH6GIgWVO7tyHmJKIGyag+Lcl6R66dCcSVPzMH8yfIXwtCA6bgawG1Hfg8QDUPEtNM/GriOs6W5PdjXdx0QZ79OKR201uIod1g6BIcgcSZfAdxhUfzFglcSHanvdt7yJmdpq00jUx2oWwlcnN9LzK1RAqlsfcBa4BZtkRMQupKrEOCJA9RO1I8+SvZ27qOZKoM0B5S6KzKFtif9uayz1YGJZ/S6iynwmTwKuedgoQfLLQlYoTUldiC5H5NIOgsUaP3bFYvrRa5txbVHTWS5+Oc+SaiAO6PzuxkiZa+wKGIQfttWyKGrsYVKild1iovy9A70XbrpoOB55C0GWt/ZBJSl2MZUhDsWGooSTGidkXsi6H7MJMIM7U5aIig7O4C/aEyGCF1Kd5C2uVMR2r6JBzx3c9YadGIqXeorlPS1EJ5rkfqfy/bTTJC6g4EdqTxBKVIIHSBB3EzXWVoNXQtgm4l8sMzBjhKpeaVdnOMkLoLLyEdL2akROvOdiKX8+2KNnQtfKeXXCgpHYqUyH0BM2gbuhlzdBIeklb/2c2/MkLqLWQUSMFhdPZg4C4kp+4Uu0kmIXU3/oqkDFyYbMezCI/qZG5XIjmZTWXreQTkbrP1dVGKCj4JOBN4Ffi33TQjpO7GXGA5cAExBjpyUyI5cc3b1jOR7qBwY8xEXSsFTlIp6UW7YUZIhYB3kSqFk4FT8IknO7SmT25Dz1LNMsUbeSmS7xikguYbwN/txhkhFQr+gCTZXqYRu9LMEMKe9iYd9SzJyH2d7TSp9NVhIcGw05B64kF3XYOhYPArpLfZqclOF5lKsBp6hoSUKbg1tRLlUKSE7ytYQ0iTkAoQ96tN4ZJkNwyPomTbZ1PZepa6FkhGLlIDIo8HzkAM2f+xG2coNAxBisy/SdixNOrUWjajdk8jpUy1xQWDgZ8jHXlPtRtmElIhYjPwENIJ48OqqiVSAiTTS2oYSRUu0itWpkpMRwAXIM0on7GbZSjsqQzrkVrP6d0zyFpHyFBYElJ6m6jUbrk/B55GDNqGLoAtkH3HFOBBpDPJR4B3kmpbIC0tckqzyt02+1IhqmxuKV6pd9WMdOuN6TO+x26WqWyFjkXAHUh9nI8jhm6o0QjfRXjUOG5kU9sKHzUUIa3Fq1TyrUW69xoMPQKjgEeQHLcz9L1iQiN31EIBeojKJs+rRD/5KFK6+PN2kww9DWcj5SgeBIYl2y0Hdoie0n57fyakoOWTPJ+JwFNIVPZxdpMMPRHfU/H+RtyeZm6Ps/TASfO+db0UlL3DbVRf+wDfRlobfcJunqGn4nDgSaSs6clAauNDI5/CJy3BJUh7o98Bo+3GGHoyLgJW6WQ+QN9LtSG5QXdGUl0vIbmdcYN6VmFA65FIJ9qXsHpHhl6CW4BG4LtAaUqTwdBWEU0uCDN2dw3c4MdAPUslo4HAA0Ad4jE1GHoFBgNfQYzc/5OiuqV2Py02QuoGCclNnA3JaBxwNxLGYWRk6JX4DmJPOiYrKaUbuM3YnRvyyURCbkOGwNEgGAT8CIm4/6zdQENvxQTgUcTQPbEVKQWLJpuUZKSUHwkpICP5uxL4ItJb7adKTgZDr8WlQBNSS2dwkpSy9bA3CSl/EpJrv5OtFPgUkij9KKETwtDNsEmfX9wKXAP8ErgVn7pk3aQAs/CZSSSlBo9b09ny3zpOSNC6xtEirQAZowh4H+J42Ap8BmlrZCgAWC5bfvG/SAT3NcAX8KjAJ55sCpCOWVpgPuiMO9t+MDr48+onCXyWk+C8yGlrBOcC3wR2qcpmZGTYrzAGuBdxKc8G+ibVB9eO1Do8wNS2fZWS0tN3QmP2RUhN7EXAOXazDPsrDkBqcW8HvgFUJetxuyEAgTvaQgI6R0ZhsbViwhSe9wBLdLvAbpbBSEniXXYBP8E1dKeT0t7yr/Z30kmVhDIV648qEQVq2uXAauA14CybigaDYDhSZ+dZJCTgA6DtlNy0BiOk9hNSptSQ8D4dDfwCWKw/AkfYFDQYWuNspAPqu8ANSItuSK8O4JZUNTWuNSG5+WjyfrFjMzoTyU1bTxA1bzAYsmIa0gV1K3AncJijYkSTtg+XmAwhwkTl1GJ4EmP0aZWKFgAz7WYZDO3DoUhowEakKNh5hGkNJWRKxDVial1YLbxnZUg+2nbgr8DpNsUMho7j00g33LeAzxGmMUSTakh7jLnZupx0lsQ6cr6OkmZb+7dlSxMyKklLkv0GsBwpyj/ZppXBsO94D/CE2jx+A5yUXJjp9bn3RjJ+FzQWSE8Sztf5MuX5udn6YbDj35C8tLuRZp4Gg6GTOAiJIt6IdMb9HDA0xWDb1RJSe7x9bUk2+yIhZfrMJaMQYx2paAPwNcSTaTAYcohL9Rd/PfAX4FhnYYbGbtfLlB7H5HqfcqGyta5OUI640cclpbhgPB3xCKYfO1NBu8BWFKpn/ZDYomeATcBvEc+lwWDIE8YgjQrfBl5GkkAHZ1WZ3L9dIop1Ml8xc00hlIxeBu4HRjg2r2inbUnBmFMLqQXq2YXAw0rWC4DrTCoyGLoORwJfBx4D5iJeuctUXSFt4UZbkVRnJaR0Q3JIcKOAOUADUk9oeFKC6+h5swc2gjRtPEXVsUeBfyJpOJ8gCJUwGAxdjmN04a8BtgG/B64EDkyRgtxCZLkkpID4UnPFTlQJbodKKtGMhu69HT/zPoMQY/WPEO/jWqSLbLVNhd4Li2npebhIF+rJwFDgdeBptacsQfrDCXkEZTemaFmT8Kn7ycUflOvwteRJW0QSlENZhMccEniUAf+N9DJ7HglfeINqirT2UCJ53HQSco9VQ1w/KUVy/k4ETlPJqBiJav+jqmoGIyRDAeJYpITGDOBgpPrhq8A/kCTS1UB9KxtNQCyznNpBLjm5BLI3KUe+NxH4OXAC8EPgNnwamY2XJKT0uk5ugTpBJdIldgYSwX6gSl3PAI8jNYs22yM3GAofE4Ar1K6yAHF/vwTcoSrdCUBFVptNemumTB67TH+HOWMliMerFmk/PV3PEt1Lystw4FQk2fgXSE+7d9UudR2BZ9FgEpKhR2KwqjunIYbwYxDD8ypV5Rbq9lxWacMlD0+9W9X41OClzZVABYsQo4UYw1Vt+5CSyxdVwnFRgRjiDwemAEcpmY5DPGZ/UonoZf3fYIRk6EXkNAnxQh2P5HSVK0m8ixjGg2Jlq5AE3+3AHiWYxD6c8zykdngD4hGbr4RzkKqU45HwgEE6lnokG/9FJAj0GXtsBiOk3o8hSgZDkPpA5wH9VdUqVZKqRzx3G/V1PRJwuBtoARKOVCSSUbiVIq75SUhm/RBghRJcUFalSc+xQolnmap4K/U8BoMR0n6KiY76dIi+9kdsOlVIxnzwmomMgnkTzJ2ESkV1iEfsICTs4C0lqzhibH9JiWi1Smhb7VEYjJAM6RikRNJXiaoMSc0oVwnIJR/f+Tuufx+EGKcPVOKJAOerGrZV34+qlOTpftuQuKItKqGtQfLRNul7JjXtp4jaLdjv0RlJ5SLERnUqUiv8dcQoPQ4xXP8EeESlsMFIOsxYVSGPQtz9UaBZ1bnAAL8UKceyygjKCMlgaA+uRUrDDkTihB5GPGVrkRSX41X6ut0hlOHASGAY4gEMyGm8/n0qUoR/F1JKZLUS1GLEQ7hKpSmDqWwGAyh5fBi4CuiDpLDcT2rDxTOQOKgiJM7o6TaON0KJ6lCVqiYoOY1RqaoI2KkS1GKVwt5EUlbetsdhMOy/OBpx7e9EPGTXA6MzfG8IEr3tI80xO4JxKl1didSG+r2S0BbEyL5TCelPwFeQ7P/x9mgMhv0LM4A/A3sQD9o1e/n+B5VEnkeCIfcVB6jE9SmVup5WtS0ONCL2pkeBLyC5b4PtURkMvRsfQSK8W1Q1u7wd+xyMBD42IIX3c4ERiDH8cuD7Sk4bVRLbhgRZ/gBJzjUYDL0Q16lEtAdJ3D2nA/t+U0nsV+S+iNpgVSGvQLx5ryGBnLuVPL+JGMkNBkMvwBBVg9YiMUS/QRJ1O4KLEFvTMuCkPI51GJIec7OSZkKJ6VXgFqSCgKEHoMhugSEDTtPFfTmSAvIT4GeIcbkj2Im0IzoRSUeZl6fx1iMhAc8pCS3RcY9WMjodsUUFY9ptj9hg6Bm4FLET+YiN5txOHu9yxM7zIlKHuysxHYmDWq1S01JgFhI9bjAYChyXqYTRgtTwPiMHx5wM/BtJEflgN1zTUOADSJhAnUpOP0Py+AwGQ4HifUjaRwJpvXRKDo99B+Km/243Xt9hev61Sky34zZKMBgMBYNzHTXtcaRedy5xFZI+8gSSjNtdGAPcqirkeqS1lKGAYLlshlOBryLR0U8jlR+fzfE5FqhkElSJXNYF13UQktqyG6lgMBKJAveUjI5Amks+1kXjMRghGfaCI5Fys6cgEdW3kB9P2H+ARUpIRyKu+XxgOJIPdybSNKAMCZgsQWo+VSDR3QOVmCbpmIyQDIZuxjgkL60JMWRflOfzfQ4xbN+HxDjlCqMQb9r1wK9JDZBsRGxXDUo6zyk57lL1tFGlwg/YdDAJydB9GIRk4b9f1ZcfI4bsfGKxSivHKCF1pq3RCKTy5dFInNEUJaYKJM/tn0gM0lDCjiuDkCJ0ZUpWryNF6Kar9BQHfmdTwwjJ0LUYg7ShvhKx6/xAJYt8YzGSgnK6qm1vdmDfoBzJQUhm/6GILapS1bHdiJ1qi0o/A5Ho7SqVhFp0i+o+C/S6dyONLo8HbtTvPGJTxAjJ0HW4RtWnTYjH6YEuOu9K4BUkCvxk4Ld7+f5kJZ7DCW1PI5Hsgnod/zIloFKVdg5WyahC1cNVKiXtAO5VafAjepxipLTJQqQ99/WIN/BNJU6DEZIhzzgEKa62G7izC8kowAolkMmIAXpD2ueHERZqO1r/H0LYcGALYvdJKDEdquRTru9vQ9JGXkOaVm5D6nufhJTEfVglphgSpLlIv3efktlwxDNnMEIy5BmDkEaOw1VFe7gbxrAYqeE9WSWZDaqCHYDYck5QMhqqqhiI0T1oENBf32tRUt2GVI1crVLNYsK+c5ud/U8HLkBc/K+o5HQq4o17Q797N9LcwErkGiEZugBnAB9FPE2/VGmlq7FJt7FIjaT3KQFNQozUxWnf36PbLqSP21ak1vZKlXiWIEGOtRmkrQC7dJ5PRexOq1TVO4rUkiiv2BQxQjJ0DQ5VAhgJfAlJdM03hqrEMUTPO1oloRGqFl2tBOQ55LMdSevYihjcg7ZIa5SA1uh3GlQ6ag/2qERVourdepWk4ojtyWCEZOhiVe2DKiEtyLGqNlgXdV8loDFKPgNVvRpJ2GVkEOLhcude0C13vapOG1R9WquSzHb9vDPYqceJOGrcGypdWbNKIyRDF2MaYjvaxd49W9kwTCWMgHhGq/pzoJJMuUpCQ/T/vkpUblebZsS+s0slpU1I0u3LSkBL83T9jYgdKaLnBgmOjCnpGYyQDF2EwcB7EJvNX4E/tvHdyTofWlS1GYREc49SW8sg3foj8T39SfVIRQgN0QHqEIPz24g7/TUlqttUlXoSmJ/ne1Cn5+iDhAugxPiuTQ8jJEPX4lTgPJVA5qRJBNORHLaAfMYooQSE1EclnWLExe6rpLHbWdj1SjClul8DEvOzWiWeoHfaSsIeaoOQYMQpSnj5JqT1hD3iNtiUMEIydA9GAjMRI/IvgYf0/Qmqwn2A1u2JEogHaoWSyGbdGnRBV6i6drBKX33URrME8VK9jLjf2yKZrUpOx9J1lRuX2HQwQjJ0L8Ygru1tiKs/wM1ITE6Q+b4OiVY+RKWcrxPmdL0XSdc4WMnrYJWadqkE9DSSE7YcMZi3F2v03KPsMRmMkPYfQhrmqE8g0c/VSIRyCWJb+hlSDuQWxI40DEmjmKaENgaxDwXdap9HjMILOkhCLlYiNiQjJIMR0n6CIA1it6pcKME0qUR0HGLv+Z5+dqAS1FcJs983KwHNVxJbhJQq6Sw2Il63YYjHbaU9LoMRUu9GnZLRcCWffkhSaz0SGX0gYjN6C3HlB5nxRYj36yUloIWEBulcYauqhwOQkAGDwdDLcRTwZ5VEFiOdPzYrCe3R152qzs1V4mlGDNpfyPPYDtLzrqHjzScNJiEZeiAWIAmjRUi9n8kqNT2HZM9PQIzSv0DCAT6FGLaHIln2+UQ9kn82AonqNhgA61zb27EU8YINQOxDDyIRysVIMusc4H6VnIYpGfmIsXlFHlS1ALuQgM1Jqh6+bo/KAOI9MfRubNHX5Uge2xolo1rERhTgCcTl/wiSAnJ+nse1AbEjVdojMpjKtv/gAKTlz6uInWgIYsNZo/8HWKfbaqQ6wAwkyvvxPI1rB2LHGmqPyGAS0v6DYsK609sQg/ZuMueegURq37+Y7LkAAACRSURBVK/ENCSP42pQ9bDKHpHBJKT9B4cjcUW1+v9qVc+alZgy4Qkk/y2f1RODVkTlKiVtskdlMELq/Zio0ohb3uNBpDTIliz7bAH+ledx7VaVrRRzrhgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwdBP+H1ZZ4Q6hBbHyAAAAAElFTkSuQmCC";
        
        //php artisan migrate:refresh --seed        
        //$this->call(UsersTableSeeder::class);
        User::create(array(
                'email' => 'francuchin@gmail.com',
                'first_name' => 'Jean',
                'last_name' => 'Aramburu',
                'password' => md5('1234'),
            ));
        User::create(array(
                'email' => 'pedro@romero.com',
                'first_name' => 'Virgilio',
                'last_name' => 'Romero',
                'password' => md5('1234'),
            ));
        $faker = Faker\Factory::create('es_ES');
        for ($i = 0; $i < 9; $i++)
        {
            User::create(array(
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => md5($faker->word),
            ));
        }
        for ($i = 0; $i < 9; $i++)
        {
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'video' => '/videos/video.mp4',
                    'poster' => $imagenBase64,
                    'id_user' =>1
                ));
        }
        for ($i = 0; $i < 3; $i++)
        {
            Challenge::create(array(
                    'title' => 'Desafio N°'.$i,
                    'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    'video' => '/videos/video.mp4',
                    'poster' => $imagenBase64,
                    'id_user' =>2
                ));
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'video' => '/videos/video.mp4',
                    'poster' => $imagenBase64,
                    'id_user' =>3
                ));
        }
        for ($i = 0; $i < 3; $i++)
        {
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'video' => '/videos/video.mp4',
                    'poster' => $imagenBase64,
                    'id_user' =>5
                ));
            Challenge::create(array(
                    'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
                    'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                    'video' => '/videos/video.mp4',
                    'poster' => $imagenBase64,
                    'id_user' =>7
                ));
        }
        //participaciones
        

        Participacion::create(array(
                'title'=>'Primer titulo participacion',
                'video'=>'/videos/video.mp4',
                'poster' => $imagenBase64,
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>2,
                'id_challenge'=>21
            ));

        Participacion::create(array(
                'title'=>'Segundo titulo participacion',
                'video'=>'/videos/video.mp4',
                'poster' => $imagenBase64,
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>1,
                'id_challenge'=>21
            ));
        for($i=3;$i<10;$i++)
            Participacion::create(array(
                'title'=>$faker->realText($maxNbChars = 10, $indexSize = 2),
                'video'=>'/videos/video.mp4',
                'poster' => $imagenBase64,
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>$i,
                'id_challenge'=>1
            ));
        for($i=4;$i<7;$i++)
            Participacion::create(array(
                'title'=>$faker->realText($maxNbChars = 10, $indexSize = 2),
                'video'=>'/videos/video.mp4',
                'poster' => $imagenBase64,
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>$i,
                'id_challenge'=>2
            ));
        for($i=4;$i<7;$i++)
            Participacion::create(array(
                'title'=>$faker->realText($maxNbChars = 10, $indexSize = 2),
                'video'=>'/videos/video.mp4',
                'poster' => $imagenBase64,
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>$i,
                'id_challenge'=>11
            ));
        for($i=11;$i<15;$i++)
            Participacion::create(array(
                'title'=>$faker->realText($maxNbChars = 10, $indexSize = 2),
                'video'=>'/videos/video.mp4',
                'poster' => $imagenBase64,
                'description'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'id_user'=>1,
                'id_challenge'=>$i
            ));

         for($i = 2 ; $i<5 ; $i++){
            $seguimiento = new seguimiento();
            $seguimiento->id_user_seguidor = 1;
            $seguimiento->id_user_seguido = $i;
            $seguimiento->save();
         }
    }

}
