package com.allievo.campusnavigation;

import androidx.activity.result.ActivityResultLauncher;
import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.TextView;

import com.allievo.campusnavigation.Utils.GlobalPreference;
import com.journeyapps.barcodescanner.CaptureActivity;
import com.journeyapps.barcodescanner.ScanContract;
import com.journeyapps.barcodescanner.ScanOptions;

public class MainActivity extends AppCompatActivity {

    WebView home_wv;
    CardView navigate_cv, facility_cv, event_cv, feedback_cv;
    private String ip, uid;

    private final ActivityResultLauncher<ScanOptions> qrLauncher =
            registerForActivityResult(new ScanContract(), result -> {
                if (result.getContents() != null) {
//                    txtResult.setText("Scanned: " + result.getContents());
                    Intent intent = new Intent(MainActivity.this, WebFunctionActivity.class);
                    intent.putExtra("qrvalue", result.getContents());
                    intent.putExtra("function", "navigate");
                    startActivity(intent);
                }
            });

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        GlobalPreference globalPreference = new GlobalPreference(this);
        ip = globalPreference.RetriveIP();
        uid = globalPreference.getUID();

        initViews();

        navigate_cv.setOnClickListener(view -> {
            ScanOptions options = new ScanOptions();
            options.setPrompt("Scan a QR Code");
            options.setBeepEnabled(true);
            options.setOrientationLocked(true);
            options.setCaptureActivity(CaptureActivity.class);
            qrLauncher.launch(options);
        });

        facility_cv.setOnClickListener(view -> {
            Intent intent = new Intent(MainActivity.this, WebFunctionActivity.class);
            intent.putExtra("function", "facility");
            startActivity(intent);
        });

        event_cv.setOnClickListener(view -> {
            Intent intent = new Intent(MainActivity.this, WebFunctionActivity.class);
            intent.putExtra("function", "events");
            startActivity(intent);
        });

        feedback_cv.setOnClickListener(view -> {
            Intent intent = new Intent(MainActivity.this, WebFunctionActivity.class);
            intent.putExtra("function", "feedback");
            startActivity(intent);
        });
    }

    private void initViews() {

        home_wv = findViewById(R.id.home_wv);
        TextView view_all_tv = findViewById(R.id.view_all_tv);
        navigate_cv = findViewById(R.id.navigate_cv);
        facility_cv = findViewById(R.id.facility_cv);
        event_cv = findViewById(R.id.event_cv);
        feedback_cv = findViewById(R.id.feedback_cv);

        view_all_tv.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, WebFunctionActivity.class);
                intent.putExtra("function", "all_events");
                startActivity(intent);
            }
        });

        String wv_url = "http://"+ip+"/navigation/api/home.php?uid="+uid;

        WebSettings webSettings = home_wv.getSettings();
        webSettings.setJavaScriptEnabled(true);

        home_wv.setWebViewClient(new WebViewClient()); // Prevent opening in an external browser
        home_wv.loadUrl(wv_url);
    }
}