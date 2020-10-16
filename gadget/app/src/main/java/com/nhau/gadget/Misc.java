package com.nhau.gadget;

import android.app.Activity;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
//import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.TaskStackBuilder;
import android.util.Log;

/**
 * Created by root on 8/30/15.
 */
public class Misc {
public void setNotification(String message,String id,Context context)
{

    Log.i("Notification","Starting  Notification");

    NotificationCompat.Builder mBuilder=new NotificationCompat.Builder(context);
    mBuilder.setAutoCancel(true);
    mBuilder.setContentTitle("Litegel Technologies");
    mBuilder.setContentText(message);
    mBuilder.setSmallIcon(R.drawable.newspaper);
    Intent resultIntent=new Intent(context,JobActivity.class);
    resultIntent.putExtra("id",id);
    TaskStackBuilder stackBuilder = TaskStackBuilder.create(context);
    stackBuilder.addNextIntent(resultIntent);
    PendingIntent resultPendingIntent=stackBuilder.getPendingIntent(0,PendingIntent.FLAG_CANCEL_CURRENT);
    mBuilder.setContentIntent(resultPendingIntent);
    NotificationManager mNotificationManager=(NotificationManager)context.getSystemService(Context.NOTIFICATION_SERVICE);
    //mBuilder.setContentIntent(resultPendingIntent);
    mBuilder.setOngoing(true);
    Notification note=mBuilder.build();
    note.defaults |= Notification.DEFAULT_VIBRATE;
    note.defaults |= Notification.DEFAULT_SOUND;

    mNotificationManager.notify(1337,note);
    Log.i("Notification","Ending  Notification");
}


    public void setPhone(String number,Activity activity,Context context)
    {

       // SharedPreferences sharedPref = activity.getPreferences(Context.MODE_PRIVATE);
        SharedPreferences sharedPref = PreferenceManager.getDefaultSharedPreferences(context);
        SharedPreferences.Editor editor = sharedPref.edit();
        editor.putString("Phone", number);
        editor.commit();
        Xmpp xmpp=new Xmpp(activity);
        xmpp.connect();

    }
    public String getPhone(Context context)
    {

        //SharedPreferences sharedPref = activity.getPreferences(Context.MODE_PRIVATE);
        SharedPreferences sharedPref = PreferenceManager.getDefaultSharedPreferences(context);
        String defaultValue = "";
        String result = sharedPref.getString("Phone", defaultValue);
        return result;

    }
    public void setUrl(String number,Activity activity,Context context)
    {

        // SharedPreferences sharedPref = activity.getPreferences(Context.MODE_PRIVATE);
        SharedPreferences sharedPref = PreferenceManager.getDefaultSharedPreferences(context);
        SharedPreferences.Editor editor = sharedPref.edit();
        editor.putString("IP", number);
        editor.commit();
        Xmpp xmpp=new Xmpp(activity);
        xmpp.connect();

    }
    public String getUrl(Context context)
    {

        //SharedPreferences sharedPref = activity.getPreferences(Context.MODE_PRIVATE);
        SharedPreferences sharedPref = PreferenceManager.getDefaultSharedPreferences(context);
        String defaultValue = "";
        String result = sharedPref.getString("IP", defaultValue);
        return result;

    }

public String baseUrl(Context context)

{//dont include protocol eg:http://

    String url="192.168.100.104";
    url=this.getUrl(context);
    return url;
}
}
