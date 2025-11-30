@extends('layouts.app')

@section('content')
    <div>
        <h1>About 30Keys</h1>
        
        <section>
            <h2>What is 30Keys?</h2>
            <p>
                30Keys is a community platform dedicated to keyboard enthusiasts and tinkerers. 
                Whether you're a seasoned keyboard builder or just starting your journey into 
                the world of custom keyboards, 30Keys provides a space to explore, share, and 
                discuss keyboard layouts.
            </p>
        </section>

        <section>
            <h2>Where it all started</h2>
            <p>
                My journey into the world of custom keyboard layout started a few years ago when I
                bought my first split keyboard (a Chocofi). At first, I wasn't able to get used to it,
                because of QWERTY, which has all the important keys in inconvenient places. This because 
                more obvious on an ergo-keyboard because your hands are in a much more relaxed position
                and the top keys are therefor harder to reach. After switching to a more ergonomic layout
                (Dvorak), I was finally able to use it. But Dvorak still has some issues for me (eg. L & S
                on the right pinky, not great in Linux!), so after going through a few more layouts (Colemak,
                Workman), which all had their own issues (both have J & K on the same finger, not great for Dutch),
                I decided to create my own layout, optimized for my own needs.
            </p>
        </section>

        <section>
            <h2>Enter Dutchman</h2>
            <p>
                Thus, Dutchman was born – a keyboard layout tailored specifically for Dutch typists
                that also type in English. It optimizes key placements for common Dutch letter combinations,
                aiming to enhance typing speed, but most of all comfort.
            </p>
            <h3>Top spots on the keyboard</h3>
            <p>
                There has been a collective evolution as to which keys are the best placed on a keyboard.
                Dvorak pioneered this by placing the most common letters on the home row, but Workman
                improved upon this by considering finger strength and lateral movements. Dutchman takes
                these principles further by combining the frequency of letters in both Dutch and English.
            </p>
            @php
                $bestSpots = (object)[
                    'layout' => [
                        ['', ' ', ' ', '', '', '', '', ' ', ' ', ''],
                        [' ', ' ', ' ', ' ', '', '', ' ', ' ', ' ', ' '],
                        ['', '', '', ' ', '', '', ' ', '', '', ''],
                    ]
                ];
            @endphp
            @include('keyboards._layout', ['keyboard' => $bestSpots])
            <h3>Key Placement Rationale</h3>
            <h4>Most Common Letters (Dutch & English Combined)</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Letter</th>
                        <th>Dutch Frequency</th>
                        <th>English Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>E</td>
                        <td>18.93%</td>
                        <td>12.70%</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>N</td>
                        <td>9.83%</td>
                        <td>7.01%</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>A</td>
                        <td>7.60%</td>
                        <td>8.10%</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>T</td>
                        <td>6.80%</td>
                        <td>8.97%</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>I</td>
                        <td>7.12%</td>
                        <td>6.49%</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>O</td>
                        <td>6.05%</td>
                        <td>7.91%</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>S</td>
                        <td>4.10%</td>
                        <td>6.28%</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>R</td>
                        <td>6.22%</td>
                        <td>5.86%</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>D</td>
                        <td>5.16%</td>
                        <td>4.52%</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>H</td>
                        <td>2.31%</td>
                        <td>6.29%</td>
                    </tr>
                </tbody>
            </table>
            <h5>Sources</h5>
            <ul>
                <li><a href="https://mk.bcgsc.ca/carpalx/lists/english.frequency.txt" target="_blank">English Letter Frequency Data</a></li>
                <li><a href="https://mk.bcgsc.ca/carpalx/lists/dutch.frequency.txt" target="_blank">Dutch Letter Frequency Data</a></li>
            </ul>
            <h4>Home Row</h4>
            <p>
                Based on the combined frequency of letters in both Dutch and English, we need to
                pick the best 8 letters from the list above to be placed on the home row. The top 5
                we obviously pick and place them on the premium places.
            </p>
            <p>
                One thing I loved about Dvorak is the separation of vowels and consonants, which
                really helps with alternating hands while typing. I decided to keep this principle
                in Dutchman by placing all vowels on the right hand side of the keyboard.
            </p>
            @php
                $dutchman = (object)[
                    'layout' => [
                        ['', '', '', '', '', '', '', '', '', ''],
                        ['', 'T', 'N', '', '', '', '', 'E', 'A', 'I'],
                        ['', '', '', '', '', '', '', '', '', ''],
                    ]
                ];
            @endphp
            @include('keyboards._layout', ['keyboard' => $dutchman])
            <p>
                From the remaining letters, we can exclude the 'R' because 
                it combines a lot with all other consonants, and is therefore
                better placed on the top row. The 'O' on the other hand is not
                suitable for the index finger, because it would complicate finding
                the 5 other keys on that finger. To 'O' goes to the top row too. 
                That leaves us with the consonents 'S', 'D' and 'H' to fill the 
                last 3 spots on the home row. 'S' is a great letter to go on the
                left pinky, because it usually comes before the others (as in 'st', 
                'sn'). This makes for great inner hand rolls.
            </p>
            @php
                $dutchman = (object)[
                    'layout' => [
                        ['', '', 'R', '', '', '', '', '', 'O', ''],
                        ['S', 'T', 'N', 'D', '', '', 'H', 'E', 'A', 'I'],
                        ['', '', '', '', '', '', '', '', '', ''],
                    ]
                ];
            @endphp
            @include('keyboards._layout', ['keyboard' => $dutchman])
            <p>
                We fill the remaining premium spots with 'L' and 'G' on the left hand, 
                and 'U' and 'K' on the right hand. This makes the 'ng' combination very easy
                to type, which is very common in Dutch and English.
            </p>
            @php
                $dutchman = (object)[
                    'layout' => [
                        ['', 'L', 'R', '', '', '', '', 'U', 'O', ''],
                        ['S', 'T', 'N', 'D', '', '', 'H', 'E', 'A', 'I'],
                        ['', '', '', 'G', '', '', 'K', '', '', ''],
                    ]
                ];
            @endphp
            @include('keyboards._layout', ['keyboard' => $dutchman])
            <p>
                From here on, the remaining letters are placed based on common Dutch
                and English letter combinations, finger strength, and overall typing comfort.
                <ul>
                    <li>'F' is placed on the left index finger, as it often combines with consonants on the left hand.</li>
                    <li>'V' does not combine much with 'S'</li>
                    <li>'Z' does not combine much with 'L'</li>
                    <li>'J' does not combine much with 'R'</li>
                    <li>'Y' is a semi-vowel, and I love typing 'you' with my right hand</li>
                    <li>'C', 'V', 'X', 'Z' are still on the left hand to easily use shortcuts</li>
                </ul>
            </p>
            @php
                $dutchman = (object)[
                    'layout' => [
                        ['', 'L', 'R', 'W', 'X', '', 'F', 'U', 'O', 'Q'],
                        ['S', 'T', 'N', 'D', 'M', 'P', 'H', 'E', 'A', 'I'],
                        ['v', 'Z', 'J', 'G', 'C', 'B', 'K', 'Y', '', ''],
                    ]
                ];
            @endphp
            @include('keyboards._layout', ['keyboard' => $dutchman])
            <p>
                That leaves us with the punctuation marks. The comma and period are placed on 
                the right hand side for easy access, and the slash on the upper pinky to offload the pinky.
                I left out the semicolon because it's not used in actual text writing that much. 
                I choose the apostrophe for that spot because it's used a lot in both Dutch and English.
            </p>
            @php
                $dutchman = (object)[
                    'layout' => [
                        ['/', 'L', 'R', 'W', 'X', '\'', 'F', 'U', 'O', 'Q'],
                        ['S', 'T', 'N', 'D', 'M', 'P', 'H', 'E', 'A', 'I'],
                        ['v', 'Z', 'J', 'G', 'C', 'B', 'K', 'Y', '.', ','],
                    ]
                ];
            @endphp
            @include('keyboards._layout', ['keyboard' => $dutchman])
            <p>
                And there we have it! The Dutchman layout, optimized for both Dutch and English typing.
                Of course, everyone has their own preferences, so feel free to tweak the layout to 
                better suit your needs!
            </p>
        </section>

        <section>
            <h2>Get Started</h2>
            <p>
                Ready to dive in? Create an account to start rating keyboards, leaving comments, 
                and sharing your own builds with the community. Browse our keyboard collection 
                to find inspiration for your own personal layout!
            </p>
        </section>
    </div>
@endsection
