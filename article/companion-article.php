<div class="sidebar">
    <div class="reading-companion">
        <div class="reading-companion-sticky" data-sticky="sticky" data-offset="120" data-constraint=".reading-companion">
            <ul class="reading-companion-tabs" role="tablist">
                <li role="presentation">
                    <button id="section" class="reading-companion-tab reading-companion--active" role="tab" onclick="switchButton(this)">Section</button>
                </li>
                <li role="presentation">
                    <button id="article" class="reading-companion-tab" role="tab" onclick="switchButton(this)">Articles </button>
                </li>
                <li role="presentation">
                    <button id="references" class="reading-companion-tab" role="tab" onclick="switchButton(this)">Références</button>
                </li>
            </ul>
            <div class="reading-companion-panel reading-companion--active" name="section">
                <ol class="reading-companion-panel-list" role="tabpanel">
                    <li class="reading-companion-section-item"><a></a></li>
                </ol>
            </div>
            <div class="reading-companion-panel" name="article">
                <ol class="reading-companion-panel-list" role="tabpanel">
                    <li class="reading-companion-section-item"><a></a></li>
                </ol>
            </div>
            <div class="reading-companion-panel" name="references">
                <ol class="reading-companion-panel-list" role="tabpanel">
                    <li class="first-reference"><a>coucou</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>