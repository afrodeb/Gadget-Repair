package com.nhau.gadget;

import android.app.Activity;
import android.provider.Settings;
import android.util.Log;
import android.widget.Toast;

import org.jivesoftware.smack.ConnectionConfiguration;
import org.jivesoftware.smack.MessageListener;
import org.jivesoftware.smack.PacketListener;
import org.jivesoftware.smack.XMPPConnection;
import org.jivesoftware.smack.XMPPException;
import org.jivesoftware.smack.filter.MessageTypeFilter;
import org.jivesoftware.smack.filter.PacketFilter;
import org.jivesoftware.smack.packet.Message;
import org.jivesoftware.smack.packet.Packet;
import org.jivesoftware.smack.packet.Presence;
import org.jivesoftware.smack.util.StringUtils;

import java.util.ArrayList;
import java.util.UUID;

/**
 * Created by root on 8/23/15.
 */
public class Xmpp {
    public XMPPConnection connection;
    public Misc misc;
    Activity _activity;

    public Xmpp(Activity activity)
    {
        this._activity=activity;

    }

    public XMPPConnection connect()
    {
        try {
           misc=new Misc();

            //String host = "10.0.2.2";
            String host=misc.baseUrl(HomeActivity.get_context());
            String port = "5222";
            String service ="localhost";

            String username =  misc.getPhone(_activity);//Get username from shared preferences
            String password =  misc.getPhone(_activity);//Get the password from shared preferences
            String resource = UUID.randomUUID().toString();
            ConnectionConfiguration connConfig =
                    new ConnectionConfiguration(host, Integer.parseInt(port), service);
            connection = new XMPPConnection(connConfig);
            connection.connect();
            connection.login(username, password);
            PacketFilter filter = new MessageTypeFilter(Message.Type.chat);
            Presence presence = new Presence(Presence.Type.available);
            connection.sendPacket(presence);
            this.setConnection(connection);

            Log.i("XMPPClient", "Logged in as " + connection.getUser());
            String to = "admin@10.0.2.2";
            String text = "Test message to church member.";
            Log.i("XMPPClient", "Sending text [" + text + "] to [" + to + "]");
            Message msg = new Message(to, Message.Type.chat);
            msg.setBody(text);
            if (connection == null)
            {
                throw new IllegalArgumentException("Connection is empty");

            }
            else {
                connection.sendPacket(msg);
                //messages.add(connection.getUser() + ":" +text);

            }
        }
        catch (Exception ex)
        {
            Log.i("Error","Error occurred "+ex.toString());
        }
        return connection;
    }

    public void setConnection(XMPPConnection connections)
    {
        Misc misc=new Misc();
        this.connection = connections;
                if (connection != null) {
                    // Add a packet listener to get messages sent to us
                    PacketFilter filter = new MessageTypeFilter(Message.Type.chat);
                    connection.addPacketListener(new PacketListener() {
                        public void processPacket(Packet packet) {
                            Message message = (Message) packet;
                            String fromName = StringUtils.parseBareAddress(message.getFrom());
                            if (message.getBody() != null) {
                                Log.i("XMPPClient", "Got text [" + message.getBody() + "] from [" + fromName + "]");
                                //System.out.println(message.getBody());
                                String []noti=message.getBody().split("-");
                                String ids=noti[0];
                                String messages= noti[1];
                                Misc misc=new Misc();
                                misc.setNotification(messages,ids,HomeActivity.get_context());
                            }

                        }
                    }, filter);
                }

    }




}
