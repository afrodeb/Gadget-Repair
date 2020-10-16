package com.nhau.gadget;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.app.Fragment;
import android.telephony.PhoneNumberFormattingTextWatcher;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class Alert extends Activity implements Runnable {
   // @Override
    Context _context;
    Activity _activity;
    Misc misc;
    public String phone;

    public Alert(Activity activity)
    {
        this._activity=activity;

    }
   public void show(final Context context) {
       this._context=context;
       final Dialog dialog = new Dialog(_context);
       dialog.setContentView(R.layout.fragment_alert);
       dialog.setTitle("Enter your phone number.");

       //Button dialogButton = (Button) dialog.findViewById(R.id.cancel);
       Button dialogOk=(Button)dialog.findViewById(R.id.submit);
       final EditText text=(EditText)dialog.findViewById(R.id.username);
       text.addTextChangedListener(new PhoneNumberFormattingTextWatcher());

       // if button is clicked, close the custom dialog
      /* dialogButton.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View v) {
               dialog.dismiss();
           }
       });*/

       dialogOk.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View v) {

               phone = text.getText().toString();
               misc = new Misc();
               if (phone != "" && phone.length() > 9){
               phone = phone.replace("(", "");
               phone = phone.replace(")", "");
               phone = phone.replace("-", "");
               phone = phone.replace(" ", "");
               //startTask();
               misc.setPhone(phone, _activity, context);
               Toast.makeText(_context, "Phone number updated.", Toast.LENGTH_LONG).show();
                   Intent intent=new Intent(HomeActivity.get_context(),HomeActivity.class);
                 HomeActivity.get_context().startActivity(intent);
                   dialog.dismiss();
           }
               else {
                   Toast.makeText(_context, "Please input a valid phone number.", Toast.LENGTH_LONG).show();
               }
           }
       });

       dialog.show();

   }

    public void getUrl(final Context context) {
        this._context=context;
        final Dialog dialog = new Dialog(_context);
        dialog.setContentView(R.layout.fragment_alert);
        dialog.setTitle("Enter IP address.");

        //Button dialogButton = (Button) dialog.findViewById(R.id.cancel);
        Button dialogOk=(Button)dialog.findViewById(R.id.submit);
        final EditText text=(EditText)dialog.findViewById(R.id.username);
        //text.addTextChangedListener(new PhoneNumberFormattingTextWatcher());

        dialogOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                phone = text.getText().toString();
                misc = new Misc();

                    misc.setUrl(phone, _activity, context);
                    Toast.makeText(_context, "IP address updated.", Toast.LENGTH_LONG).show();
                    Intent intent=new Intent(HomeActivity.get_context(),HomeActivity.class);
                    HomeActivity.get_context().startActivity(intent);
                    dialog.dismiss();

            }
        });

        dialog.show();

    }

    public void startTask()
    {
        //HomeActivity.startTask();

    }
    @Override
    public void run() {
       // for (int i = 0; i <= 10; i++) {
          //  final int value = i;
            try {
                Thread.sleep(1000);
               // misc.setPhone(phone,_);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            //bar.setProgress(value);

        //}
    }

}
